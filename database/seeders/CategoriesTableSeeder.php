<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Modelを使用して、データを書き込むので、記載する。
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // 配列でデータを手動で入れていく。
        // $major_category_names = [
        //     '本', 'コンピュータ', 'ディスプレイ'
        // ];

        // $book_categories = [
        //     'ビジネス', '文学・評論', '人文・思想', 'スポーツ',
        //     'コンピュータ・IT', '資格・検定・就職', '絵本・児童書', '写真集',
        //     'ゲーム攻略本', '雑誌', 'アート・デザイン', 'ノンフィクション'
        // ];

        // $computer_categories = [
        //     'ノートPC', 'デスクトップPC', 'タブレット'
        // ];

        // $display_categories = [
        //     '19~20インチ', 'デスクトップPC', 'タブレット'
        // ];

        // //foreachで回し、出力。
        // foreach ($major_category_names as $major_category_name) {
        //     // $major_category_nameの中に'本'が入っている場合、
        //     if ($major_category_name == '本') {
        //         foreach ($book_categories as $book_category) {
        //             Category::create([
        //                 'name' => $book_category,
        //                 'description' => $book_category,
        //                 'major_category_name' => $major_category_name
        //             ]);
        //         }
        //     }

        //     if ($major_category_name == 'コンピュータ') {
        //         foreach ($computer_categories as $computer_category) {
        //             Category::create([
        //                 'name' => $computer_category,
        //                 'description' => $computer_category,
        //                 'major_category_name' => $major_category_name
        //             ]);
        //         }
        //     }

        //     if ($major_category_name == 'ディスプレイ') {
        //         foreach ($display_categories as $display_category) {
        //             Category::create([
        //                 'name' => $display_category,
        //                 'description' => $display_category,
        //                 'major_category_name' => $major_category_name
        //             ]);
        //         }
        //     }
        // }

        Category::create([
            'id' => '1',
            'name' => '本',
            'description' => 'ビジネス',
            'major_category_name' => 'ビジネス',
            '氏名' => '丸山 未希子',
            '所属支社' => '東京支社',
            '所属部署' => '総務部',

        ]);

        Category::create([
            'id' => '2',
            'name' => '本',
            'description' => 'ビジネス',
            'major_category_name' => 'ビジネス',
            '氏名' => '丸多 未希',
            '所属支社' => '東京支社',
            '所属部署' => '総務部',

        ]);

        Category::create([
            'id' => '3',
            'name' => '本',
            'description' => 'ビジネス',
            'major_category_name' => 'ビジネス',
            '氏名' => '田口 舞子',
            '所属支社' => '東京支社',
            '所属部署' => 'システム部',

        ]);

        Category::create([
            'id' => '4',
            'name' => '本',
            'description' => 'ビジネス',
            'major_category_name' => 'ビジネス',
            '氏名' => '八尾 努',
            '所属支社' => '東京支社',
            '所属部署' => 'システム部',

        ]);

        Category::create([
            'id' => '5',
            'name' => 'PC',
            'description' => 'ノートPC',
            'major_category_name' => 'ノートPC',
            '氏名' => '吉田 亮佑',
            '所属支社' => '大阪支社',
            '所属部署' => '総務部',

        ]);

        Category::create([
            'id' => '6',
            'name' => 'PC',
            'description' => 'ノートPC',
            'major_category_name' => 'ノートPC',
            '氏名' => '川根 裕志',
            '所属支社' => '大阪支社',
            '所属部署' => '総務部',

        ]);

        Category::create([
            'id' => '7',
            'name' => 'PC',
            'description' => 'ノートPC',
            'major_category_name' => 'ノートPC',
            '氏名' => '澤田 亜矢子',
            '所属支社' => '大阪支社',
            '所属部署' => 'システム部',

        ]);

        Category::create([
            'id' => '8',
            'name' => 'PC',
            'description' => 'ノートPC',
            'major_category_name' => 'ノートPC',
            '氏名' => '松澤 真弓',
            '所属支社' => '大阪支社',
            '所属部署' => 'システム部',

        ]);
    }
}
