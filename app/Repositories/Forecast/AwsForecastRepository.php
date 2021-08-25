<?php

namespace App\Repositories\Forecast;

use App\Models\ForecastInquiry;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Laravel\AwsFacade as AWS;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AwsForecastRepository implements ForecastRepositoryInterface
{
    const TABLE_NAME = 'ForecastInquiries';
    private DynamoDbClient $awsClient;

    /**
     * AwsForecastRepository constructor.
     */
    public function __construct()
    {
        $this->awsClient = AWS::createClient('dynamoDb');
    }

    public function createItem(ForecastInquiry $forecastInquiry)
    {
        $sortKey = $forecastInquiry->date->format('y-m-d') . ':' . $forecastInquiry->locationId;

        return $this->awsClient->putItem([
            'TableName' => self::TABLE_NAME,
            'Item' => [
                'Number' => ['S' => $forecastInquiry->phoneNumber],
                'DateLocation' => ['S' => $sortKey]
            ]
        ]);
    }

    public function getItems(string $number, string $date): Collection
    {
        $items = $this->awsClient->query([
            'TableName' => self::TABLE_NAME,
            'KeyConditionExpression' => '#Number = :Number and begins_with(#DateLocation, :DateLocation)',
            'ExpressionAttributeNames' => [
                "#Number" => 'Number',
                '#DateLocation' => 'DateLocation'
              ],
            'ExpressionAttributeValues' => [
                ':Number' => ['S' => $number],
                ':DateLocation' => ['S' => $date]
            ],
        ]);

        $inquiries = Collection::empty();

         foreach ($items['Items'] as $item) {
             $inquiries->add($this->mapToForecastInquiry($item));
         }

        return $inquiries;
    }

    private function mapToForecastInquiry($item): ForecastInquiry
    {
        $dateLocationArray = $this->parseDateLocation($item['DateLocation']['S']);

        return ForecastInquiry::make(
            (int) $dateLocationArray[1],
            $item['Number']['S'],
            Carbon::make($dateLocationArray[0])
        );
    }

    private function parseDateLocation($dateLocation): array
    {
        return explode(':', $dateLocation);
    }
}
