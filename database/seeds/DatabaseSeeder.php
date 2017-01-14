<?php
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        DB::table('games')->truncate();
        // データ挿入
        $now = Carbon::now();
        $ps4_001 = [
            "name" => "メタルギアソリッドV ファントムペイン",
            "img" => "img/ps4/ps4_001.jpg",
            "description" =>
            "第1作『METAL GEAR』の中で最後の敵として登場した「BIGBOSS（ネイキッド・スネーク）」を主人公として、「なぜ英雄（BIGBOSS）が悪の道へ堕ちることになったのか？」というシリーズ最大の謎となるエピソードが描かれる。",
            "platform" => "PS4",
            "maker" => "コナミデジタルエンタテインメント",
            "price" => 3500,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $ps4_002 = [
            "name" => "コール オブ デューティ ブラックオプスIII",
            "img" => "img/ps4/ps4_002.jpg",
            "description" =>
            "『コール オブ デューティ ブラックオプスIII』は、アクティビジョンが、開発スタジオTreyarch(トレイアーク)と作り上げた人気ファーストパーソンシューターシリーズの最新作。前作『コール オブ デューティ ブラックオプスII』より40年が経過した2065年が舞台。
軍事技術がさらに進化し、兵士の体を機械化した強力な人間兵器同士が戦う世界で物語が展開する。",
            "platform" => "PS4",
            "maker" => "Treyarch",
            "price" => 6708,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $ps4_003 = [
            "name" => "DARK SOULS III",
            "img" => "img/ps4/ps4_003.jpg",
            "description" =>
            "「DARK SOULS III」では、新要素「戦技」と呼ばれる武器固有の様々なアクションで、ロールプレイ性豊かな戦略性ある駆け引きを重視した剣戟バトルを楽しむことができます。
            滅びゆく終末の世界を舞台に繰り広げられる、絶望と希望のダークファンタジーをお楽しみください。",
            "platform" => "PS4",
            "maker" => "フロムソフトウェア",
            "price" => 6087,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $ps4_004 = [
            "name" => "オーバーウォッチ オリジンズ・エディション",
            "img" => "img/ps4/ps4_004.jpg",
            "description" =>
            "",
            "platform" => "PS4",
            "maker" => "Blizzard Entertainment",
            "price" => 6708,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $ps4_005 = [
            "name" => "バトルフィールド4",
            "img" => "img/ps4/ps4_005.jpg",
            "description" =>
            "ついに家庭用ゲーム機で60ｆｐｓ/64人対戦が実現！シリーズ初、家庭用ゲーム機で64人対戦、司令官を含めると66人対戦が可能に！また、この大規模な対戦を常時60fpsで実現！PS3の8倍ともいわれる美麗なグラフィック性能を持つPS4の真価を余すことなく発揮！■インタラクティブエンターテインメントの未来を先取り！リアルタイムで刻々と変化するフィールドと、双方向性のエンタテインメント性により、同じ戦場は2度と味わえない。次世代を見据えて開発された「Frostbite 3」エンジンの力を最大限に発揮。コマンダーモードでは、タブレットを使って舞台を指揮。どこからでも戦況をひっくり返すなんてことは、「バトルフィールド」でしか味わえない。",
            "platform" => "PS4",
            "maker" => "エレクトロニック・アーツ",
            "price" => 9044,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $ps3_001 = [
            "name" => "キングダム ハーツ -HD 2.5 リミックス-",
            "img" => "img/ps3/ps3_001.jpg",
            "description" =>
            "シリーズを語る上で欠かせない「KINGDOM HEARTS II（キングダム ハーツ II」、その後を描いた「KINGDOM HEARTS Re:coded（キングダム ハーツ Re：コーデッド）」（HD映像作品）、シリーズの起源が描かれた「KINGDOM HEARTS Birth by Sleep（キングダム ハーツ バース バイ スリープ」の3作品を収録。",
            "platform" => "PS3",
            "maker" => "スクウェア･エニックス",
            "price" => 5590,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $xbox360_001 = [
            "name" => "グランド・セフト・オートV",
            "img" => "img/xbox360/xbox360_001.jpg",
            "description" =>
            "大都市ロスサントスや田舎のブレイン郡を訪れる人々は、かつての有名人や薬物依存者、パーティー好き、暴力的なギャング、ハイカー、バイカーなどありとあらゆる住人に出会うこととなる。
山の頂上から、ロスサントスの通り、そして海の底まであらゆる場所を移動することができる。",
            "platform" => "XBOX360",
            "maker" => "Rockstar Games",
            "price" => 4380,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $xboxone_001 = [
            "name" => "ウォッチドッグス2",
            "img" => "img/xboxone/xboxone_001.jpg",
            "description" =>
            "プレイヤーは若きハッカー「マーカス・ホロウェイ」となり、ハッカー集団「デッドセック」の一員として、この街を支配するオペレーティングシステム、「ctOS 2.0」に挑む。
ハッキング能力を駆使して街のあらゆるものをコントロールし、自由なアプローチで計画を遂行しよう。",
            "platform" => "XBOXONE",
            "maker" => "ユービーアイソフト",
            "price" => 8160,
            "created_at" => $now,
            "updated_at" => $now
        ];

        DB::table('games')->insert([$ps4_001, $ps4_002,$ps4_003,$ps4_004,$ps4_005,$ps3_001,$xbox360_001,$xboxone_001]);

        // データのクリア
        DB::table('users')->truncate();
        // データ挿入
        $now = Carbon::now();
        $sample = [
            "name" => "sample",
            "email" =>"sample@mail.com",
            "password" => "bcrypt('sample')",
            "remember_token" => "NULL",
            "created_at" => $now,
            "updated_at" => $now
        ];

        DB::table('users')->insert([$sample]);
    }

}
