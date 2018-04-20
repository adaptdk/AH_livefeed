# Adapt Hackathon Livefeed
Adapt Hackathon - proof of concept, live feed of sales.

**TL;DR: Broadcast orders as events, listen for events, handle order and update map.**

## Project objective

- Main objective is a live-updating web interface displaying orders on a map as they happen.
- Ideally using WebSockets for realtime updates by broadcasting server-side order events to a client-side application.
- Alternatively using polling to simulate live updates.
- OrderFeed in this repository could be used to generate the order data structures.

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

// Get a single Order including OrderItems
$order = Order::create();
```

## Examples
Example feed is included in `examples/livefeed.json`

## Testing

``` bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests
```

## License

The MIT License (MIT).
