# Adapt Hackathon Livefeed
Adapt Hackathon - proof of concept, live feed of sales

## Installation
```bash
git clone git@github.com:adaptdk/AH_livefeed.git
composer install
```

## Usage

```php
use Hackathon\Livefeed\OrderFeed;

// Specify order amount and retrieve JSON encoded order feed
$feed = OrderFeed::getOrders(4);
```

## Examples
Example feed is included in `examples/livefeed.json`

## Testing

``` bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests
```

## License

The MIT License (MIT).
