<?php

declare(strict_types=1);

namespace App\Diet\Tests\Domain\Model;

use App\Diet\Domain\Model\Ingredient;
use App\Diet\Domain\Model\Product;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\UuidInterface;

class IngredientTest extends TestCase
{
    private $ingredient;

    protected function setUp()
    {
        $this->ingredient = new Ingredient(
            new Product('Product Name'),
            100
        );
    }

    public function testEntityIsValidAfterCreation()
    {
        $this->assertInstanceOf(UuidInterface::class, $this->ingredient->getId());
        $this->assertInstanceOf(Product::class, $this->ingredient->getProduct());
        $this->assertSame(100, $this->ingredient->getWeight());
    }

    public function testCanChangeWeight()
    {
        $this->ingredient->changeWeight(200);
        $this->assertSame(200, $this->ingredient->getWeight());
    }

    public function testCanGetWeightWithUnit()
    {
        $this->assertEquals('100 g', $this->ingredient->getWeightWithUnit());
    }
}