<?php

namespace VehicleSystem;

// Trait untuk memberikan fungsionalitas tambahan pada class Vehicle dan ElectricVehicle
trait Reviewable {
    private $reviews = [];

    public function addReview($review) {
        $this->reviews[] = $review;
    }

    public function getReviews() {
        return $this->reviews;
    }
}

// Abstract class 
abstract class Vehicle {
    protected $brand;
    protected $model;

    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    // Abstract method 
    abstract public function getDetails();

    // Magic method 
    public function __toString() {
        return $this->getDetails();
    }
}


class GasVehicle extends Vehicle {
    use Reviewable; 

    private $fuelCapacity;

    public function __construct($brand, $model, $fuelCapacity) {
        parent::__construct($brand, $model);
        $this->fuelCapacity = $fuelCapacity;
    }

    public function getDetails() {
        return "Brand: {$this->brand}, Model: {$this->model}, Fuel Capacity: {$this->fuelCapacity} liters";
    }
}


class ElectricVehicle extends Vehicle {
    use Reviewable;

    private $batteryCapacity;

    public function __construct($brand, $model, $batteryCapacity) {
        parent::__construct($brand, $model);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function getDetails() {
        return "Brand: {$this->brand}, Model: {$this->model}, Battery Capacity: {$this->batteryCapacity} kWh";
    }
}


class Garage {
    private $vehicles = [];

    public function addVehicle(Vehicle $vehicle) {
        $this->vehicles[] = $vehicle;
    }

    // public function listVehicles() {
    //     foreach ($this->vehicles as $vehicle) {
    //         echo $vehicle . PHP_EOL; // Memanggil __toString dari Vehicle
    //         echo "Reviews: " . implode(", ", $vehicle->getReviews()) . PHP_EOL;
    //         echo str_repeat("-", 20) . PHP_EOL;
    //     }
    // }

    // Magic method
    public function __toString() {
        $output = "Garage Vehicle List:" . PHP_EOL;
        foreach ($this->vehicles as $vehicle) {
            $output .= $vehicle . PHP_EOL; // Memanggil __toString dari Vehicle
            $output .= "Reviews: " . implode(", ", $vehicle->getReviews()) . PHP_EOL;
            $output .= str_repeat("-", 20) . PHP_EOL;
        }
        return $output;
    }
}

// Penggunaan program
$garage = new Garage();

$gasVehicle = new GasVehicle("Toyota", "Camry", 60);
$gasVehicle->addReview("Very fuel efficient!");
$gasVehicle->addReview("Smooth driving experience.");

$electricVehicle = new ElectricVehicle("Tesla", "Model S", 100);
$electricVehicle->addReview("Incredible acceleration!");
$electricVehicle->addReview("Eco-friendly and silent.");

$garage->addVehicle($gasVehicle);
$garage->addVehicle($electricVehicle);


echo $garage;

?>
