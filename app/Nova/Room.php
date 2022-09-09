<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class Room extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Room::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Slug::make('Slug')
                ->from('Name')
                ->onlyOnDetail(),

            Select::make('Type')
                ->options([
                    'production-studio' => 'Production Studio',
                ])
                ->displayUsingLabels()
                ->sortable()
                ->rules('required'),

            // TODO
            // Select::make('Lock ID')
            //     ->options((new \App\Models\Room)::getCodeLocksList())
            //     ->hideFromIndex()
            //     ->displayUsingLabels()
            //     ->sortable(),

            // TODO
            // NovaTinyMCE::make('Description')->alwaysShow(),

            Currency::make('Rate')
                ->currency('GBP')
                ->sortable()
                ->rules('required'),

            Flexible::make('Additional Rates')
                ->addLayout('Additional Rate', 'additional_rates', [
                    Currency::make('Rate')
                        ->currency('GBP')
                        ->rules('required'),

                    Select::make('Duration')
                        ->options([
                            '2' => 'Equal to or greater than 2 hours',
                            '3' => 'Equal to or greater than 3 hours',
                            '4' => 'Equal to or greater than 4 hours',
                            '5' => 'Equal to or greater than 5 hours',
                            '6' => 'Equal to or greater than 6 hours',
                            '7' => 'Equal to or greater than 7 hours',
                            '8' => 'Equal to or greater than 8 hours',
                            '9' => 'Equal to or greater than 9 hours',
                            '10' => 'Equal to or greater than 10 hours',
                            '11' => 'Equal to or greater than 11 hours',
                            '12' => 'Equal to or greater than 12 hours',
                            '13' => 'Equal to or greater than 13 hours',
                            '14' => 'Equal to or greater than 14 hours',
                            '15' => 'Equal to or greater than 15 hours',
                            '16' => 'Equal to or greater than 16 hours',
                            '17' => 'Equal to or greater than 17 hours',
                            '18' => 'Equal to or greater than 18 hours',
                            '19' => 'Equal to or greater than 19 hours',
                            '20' => 'Equal to or greater than 20 hours',
                            '21' => 'Equal to or greater than 21 hours',
                            '22' => 'Equal to or greater than 22 hours',
                            '23' => 'Equal to or greater than 23 hours',
                            '24' => 'Equal to or greater than 24 hours',
                        ])
                        ->displayUsingLabels()
                        ->rules('required'),
                ])
                ->button('Add additional rate'),


            Flexible::make('Equipment')
                ->addLayout('Equipment', 'equipment', [
                    Text::make('Type')->rules('required', 'max:255'),

                    Text::make('Name')->rules('required', 'max:255'),
                ])
                ->button('Add equipment'),

            // TODO
            // Image Gallery

            Boolean::make('Available')->nullable(),

            // TODO
            // HasMany::make('Bookings')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
