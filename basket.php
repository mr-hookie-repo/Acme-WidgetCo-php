<?php

class Basket {
    private $total_cost = 0;
    private $product_array = [];
    private const PRICES = [
        'R01' => 32.95,
        'B01' => 7.95,
        'G01' => 24.95
    ];
    private const DELIVERY_RULES = [
        ['threshold' => 90, 'fee' => 0],
        ['threshold' => 50, 'fee' => 2.95],
        ['threshold' => 0,  'fee' => 4.95]
    ];

    public function addProduct(string $type): void {
        if (isset(self::PRICES[$type])) {
            $this->product_array[] = $type;
        }
    }

    public function getProducts(): array {
        return $this->product_array;
    }

    public function removeProduct(string $type): void {
        $index = array_search($type, $this->product_array);
        if ($index !== false) {
            array_splice($this->product_array, $index, 1);
        }
    }

    public function getTotalCost(): string {
        $this->total_cost = 0;
        $red_count = 0;

        foreach ($this->product_array as $product) {
            if ($product === 'R01') {
                $this->total_cost += self::PRICES[$product] * (($red_count % 2 === 0) ? 1 : 0.5);
                $red_count++;
            } else {
                $this->total_cost += self::PRICES[$product];
            }
        }

        $this->total_cost += $this->getDeliveryFee();

        return number_format($this->total_cost, 2);
    }

    private function getDeliveryFee(): float {
        foreach (self::DELIVERY_RULES as $rule) {
            if ($this->total_cost >= $rule['threshold']) {
                return $rule['fee'];
            }
        }
        return 0;
    }
}