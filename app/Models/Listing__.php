<?php
namespace App\Models;

use Illuminate\Support\Arr;

class Listing {
    public static function all() {
        return [
                [
                    'id' => 1,
                    'title' => 'Senior Java Engineer',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took',
                ],
                [
                    'id' => 2,
                    'title' => 'Senior PHP Engineer',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took',
                ],
                [
                    'id' => 3,
                    'title' => 'Junior React Engineer',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took',
                ],
            ];
    }

    public static function find($id) {
        return collect(self::all())->filter(function ($job, $key) use ($id) {
            return $job['id'] == $id;
        })->first();
    }
}

?>