<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertingTestingData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        filling halls

        DB::table('halls')->insert(
            array(
                array(
                    'name' => 'Зал 1',
                    'num_of_rows' => '2',
                    'num_of_seats' => '2',
                    'price_vip' => 0,
                    'price_regular' => 50,
                    'open' => true,
                ),
                array(
                    'name' => 'Зал 2',
                    'num_of_rows' => '4',
                    'num_of_seats' => '4',
                    'price_vip' => 200,
                    'price_regular' => 100,
                    'open' => true,
                )
            )
        );

//        filling seats

        DB::table('seats')->insert(
            array(
                array(
                    'number' => 1,
                    'row' => 1,
                    'type' => 'regular',
                    'hall_id' => 1,
                ),
                array(
                    'number' => 2,
                    'row' => 1,
                    'type' => 'regular',
                    'hall_id' => 1,
                ),
                array(
                    'number' => 1,
                    'row' => 2,
                    'type' => 'regular',
                    'hall_id' => 1,
                ),
                array(
                    'number' => 2,
                    'row' => 2,
                    'type' => 'regular',
                    'hall_id' => 1,
                ),
                array(
                    'number' => 1,
                    'row' => 1,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 2,
                    'row' => 1,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 3,
                    'row' => 1,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 4,
                    'row' => 1,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 1,
                    'row' => 2,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 2,
                    'row' => 2,
                    'type' => 'vip',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 3,
                    'row' => 2,
                    'type' => 'vip',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 4,
                    'row' => 2,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 1,
                    'row' => 3,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 2,
                    'row' => 3,
                    'type' => 'vip',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 3,
                    'row' => 3,
                    'type' => 'vip',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 4,
                    'row' => 3,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 1,
                    'row' => 4,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 2,
                    'row' => 4,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 3,
                    'row' => 4,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
                array(
                    'number' => 4,
                    'row' => 4,
                    'type' => 'regular',
                    'hall_id' => 2,
                ),
            )
        );

        DB::table('movies')->insert(
            array(
                array(
                    'name' => 'Морозко',
                    'description' => 'Жила-была хорошая добрая девушка Настенька. Злая мачеха заставляла ее работать, не давая продыху. Однажды она решила избавиться от падчерицы и отправила ту замерзать в зимний лес. В этих же краях жил паренек Иван. Он полюбил Настеньку, да вот только был он большим хвастуном, потому лесной колдун и превратил его в медведя. И Настеньке, и Ивану пришлось пройти через много испытаний, прежде чем соединить свои судьбы. И помог им в этом добрый волшебник — дедушка Морозко...',
                    'duration' => 84,
                    'production_country' => 'СССР',
                    'img_url' => 'https://avatars.mds.yandex.net/get-kinopoisk-image/1777765/e67bcfa7-b247-44c3-a0b5-2c6b02da4976/300x450'
                ),
                array(
                    'name' => 'Василиса Прекрасная',
                    'description' => 'Задумал отец женить трех своих сыновей. Вышли братья в чистое поле и пустили стрелы в разные стороны. Стрела старшего сына упала на боярский двор, к боярской дочери, стрела среднего сына — упала на двор купеческой, а стрела Ивана, младшего сына упала на болото к лягушке-квакушке...',
                    'duration' => 74,
                    'production_country' => 'СССР',
                    'img_url' => 'https://avatars.mds.yandex.net/get-kinopoisk-image/1946459/50cd804e-2ae6-4207-80fe-a4a6b4615353/300x450'
                ),

            )
        );
        DB::table('sessions')->insert(
            array(
                array(
                    'movie_id' => 1,
                    'hall_id' => 1,
                    'hours' => '08',
                    'minutes' => '30',
                ),
                array(
                    'movie_id' => 2,
                    'hall_id' => 1,
                    'hours' => '21',
                    'minutes' => '00',
                ),
                array(
                    'movie_id' => 1,
                    'hall_id' => 2,
                    'hours' => '09',
                    'minutes' => '00',
                ),
                array(
                    'movie_id' => 2,
                    'hall_id' => 2,
                    'hours' => '18',
                    'minutes' => '00',
                ),
                array(
                    'movie_id' => 1,
                    'hall_id' => 1,
                    'hours' => '12',
                    'minutes' => '00',
                ),
                array(
                    'movie_id' => 2,
                    'hall_id' => 1,
                    'hours' => '12',
                    'minutes' => '30',
                ),
                array(
                    'movie_id' => 1,
                    'hall_id' => 2,
                    'hours' => '16',
                    'minutes' => '30',
                ),
                array(
                    'movie_id' => 2,
                    'hall_id' => 2,
                    'hours' => '19',
                    'minutes' => '30',
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
