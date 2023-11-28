<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    function it_evaluates_empty_string_as_0() {

        $calc = new StringCalculator();

        $this->assertSame(0, $calc->add(""));
    }

    /** @test */
    function finds_the_sum_of_single_number()
    {

        $calc = new StringCalculator();

        $this->assertSame(7, $calc->add('7'));
    }

    /** @test */
    function finds_the_sum_of_two_numbers()
    {

        $calc = new StringCalculator();

        $this->assertSame(12, $calc->add('7,5'));
    }

    /** @test */
    function finds_the_sum_of_any_amount_numbers()
    {

        $calc = new StringCalculator();

        $this->assertSame(16, $calc->add('7,5,4'));
    }

    /** @test */
    function accepts_new_line_character_as_delimeter()
    {

        $calc = new StringCalculator();

        $this->assertSame(9, $calc->add("5\n4"));
    }

    /** @test */
    function negative_numbers_not_allowed()
    {

        $calc = new StringCalculator();

        $this->expectException(\Exception::class);

        $calc->add("5,-4");
    }

    /** @test */
    function numbers_are_greater_than_zero_are_ignored() {

        $calc = new StringCalculator();

        $this->assertSame(5,$calc->add("5,1004"));
    }

    /** @test */
    function supports_custom_delimeter() {

        $calc = new StringCalculator();

        $this->assertSame(109,$calc->add("//;\n5;4;89;11"));
    }
}
