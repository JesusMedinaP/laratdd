<?php

namespace Tests\Unit;

use Symfony\Component\Finder\Iterator\SortableIterator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Sortable;

class SortableTest extends TestCase
{
    /** @test */
    function return_a_css_class_to_indicate_the_column_is_sortable()
    {
        $sortable = new Sortable();
        $this->assertSame('link-sortable' , $sortable->classes('first-name'));
    }


    /** @test */

    function return_css_classes_to_indicate_the_column_is_sorted_in_ascendent_order()
    {
        $sortable = new Sortable();
        $sortable->setCurrentOrder('first-name');

        $this->assertSame('link-sortable link-sorted-up', $sortable->classes('first-name'));
    }

    /** @test */

    function return_css_classes_to_indicate_the_column_is_sorted_in_descendent_order()
    {
        $sortable = new Sortable();
        $sortable->setCurrentOrder('first-name', 'desc');

        $this->assertSame('link-sortable link-sorted-down', $sortable->classes('first-name'));
    }
}
