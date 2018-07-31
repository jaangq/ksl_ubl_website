<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // seeding user_roles table
        DB::table('user_roles')->insert([
          'id' => 1,
          'name' => 'admin',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('user_roles')->insert([
           'id' => 2,
           'name' => 'user',
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s')
        ]);

        // seeding users table
        DB::table('users')->insert([
          'name' => 'Ling Ling',
          'email' => 'lingling@gmail.com',
          'password' => bcrypt('secret'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
          'name' => 'Ling Ling',
          'email' => 'lingling@gmail.com',
          'password' => bcrypt('secret'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        // seeding tags table
        DB::table('tags')->insert([
          'name' => 'KSL',
          'desc' => 'Kelompok Study Linux',
          'name_en' => 'KSL',
          'desc_en' => 'Kelompok Study Linux',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
          'name' => 'Linux',
          'desc' => 'Linux adalah keluarga dari sistem operasi perangkat lunak bebas dan sumber terbuka yang dibangun di sekitar kernel Linux.',
          'name_en' => 'Linux',
          'desc_en' => 'Linux is a family of free and open-source software operating systems built around the Linux kernel.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        // seeding categories table
        DB::table('categories')->insert([
          'id', => '1',
          'name' => 'Linux',
          'desc' => 'Linux adalah keluarga dari sistem operasi perangkat lunak bebas dan sumber terbuka yang dibangun di sekitar kernel Linux.',
          'name_en' => 'Linux',
          'desc_en' => 'Linux is a family of free and open-source software operating systems built around the Linux kernel.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id', => '2',
          'name' => 'Pemrograman',
          'desc' => 'Pemrograman adalah proses membuat serangkaian instruksi yang memberi tahu komputer cara melakukan suatu tugas.',
          'name_en' => 'Programming',
          'desc_en' => 'Programming is the process of creating a set of instructions that tell a computer how to perform a task.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id', => '3',
          'name' => 'Jaringan Komputer (Networking)',
          'desc' => 'Networking, juga dikenal sebagai jaringan komputer, adalah praktik pengangkutan dan pertukaran data antara node melalui media bersama dalam suatu sistem informasi.',
          'name_en' => 'Networking',
          'desc_en' => 'Networking, also known as computer networking, is the practice of transporting and exchanging data between nodes over a shared medium in an information system.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id', => '4',
          'name' => 'Desain',
          'desc' => 'Desain adalah pembuatan rencana atau konvensi untuk pembangunan objek, sistem atau interaksi manusia yang dapat diukur (seperti dalam cetak biru arsitektur, gambar teknik, proses bisnis, diagram sirkuit, dan pola jahit). Desain memiliki konotasi yang berbeda di berbagai bidang (lihat disiplin desain di bawah). Dalam beberapa kasus, konstruksi langsung suatu objek (seperti dalam gerabah, teknik, manajemen, pengkodean, dan desain grafis) juga dianggap menggunakan pemikiran desain.',
          'name_en' => 'Design',
          'desc_en' => 'Design is the creation of a plan or convention for the construction of an object, system or measurable human interaction (as in architectural blueprints, engineering drawings, business processes, circuit diagrams, and sewing patterns). Design has different connotations in different fields (see design disciplines below). In some cases, the direct construction of an object (as in pottery, engineering, management, coding, and graphic design) is also considered to use design thinking. ',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        // seeding sub_categories table
        DB::table('sub_categories')->insert([
          'id', => '1',
          'name' => 'Debian',
          'desc' => 'Debian adalah distribusi yang menekankan perangkat lunak bebas. Ini mendukung banyak platform perangkat keras. Debian dan distribusi berdasarkan itu menggunakan format paket .deb dan manajer paket dpkg dan frontendnya (seperti apt-get atau synaptic)',
          'name_en' => 'Debian',
          'desc_en' => 'Debian is a distribution that emphasizes free software. It supports many hardware platforms. Debian and distributions based on it use the .deb package format and the dpkg package manager and its frontends (such as apt-get or synaptic)',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '1'
        ]);
        DB::table('sub_categories')->insert([
          'id', => '2',
          'name' => 'Arch Linux',
          'desc' => 'Arch Linux adalah distribusi GNU / Linux yang dikembangkan secara independen, x86-64 yang bertujuan untuk menyediakan versi stabil terbaru dari sebagian besar perangkat lunak dengan mengikuti model peluncuran-bergulir. Instalasi default adalah sistem basis minimal, dikonfigurasi oleh pengguna untuk hanya menambahkan apa yang diminta dengan sengaja.',
          'name_en' => 'Arch Linux',
          'desc_en' => 'Arch Linux is an independently developed, x86-64 general-purpose GNU/Linux distribution that strives to provide the latest stable versions of most software by following a rolling-release model. The default installation is a minimal base system, configured by the user to only add what is purposely required. ',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '1'
        ]);
        DB::table('sub_categories')->insert([
          'id', => '3',
          'name' => 'Fedora',
          'desc' => 'Fedora adalah distribusi Linux yang dikembangkan oleh Proyek Fedora yang didukung masyarakat dan disponsori oleh Red Hat. Fedora berisi perangkat lunak yang didistribusikan di bawah berbagai lisensi sumber terbuka dan gratis dan bertujuan untuk menjadi terdepan dari teknologi tersebut. Fedora adalah sumber hulu dari distribusi Red Hat Enterprise Linux komersial.',
          'name_en' => 'Fedora',
          'desc_en' => 'Fedora is a Linux distribution developed by the community-supported Fedora Project and sponsored by Red Hat. Fedora contains software distributed under various free and open-source licenses and aims to be on the leading edge of such technologies. Fedora is the upstream source of the commercial Red Hat Enterprise Linux distribution.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '1'
        ]);
        DB::table('sub_categories')->insert([
          'id', => '4',
          'name' => 'Laravel',
          'desc' => 'Laravel adalah framework web PHP gratis, open-source, yang dibuat oleh Taylor Otwell dan ditujukan untuk pengembangan aplikasi web mengikuti pola arsitektur model-view – controller dan berdasarkan Symfony.',
          'name_en' => 'Laravel',
          'desc_en' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '2'
        ]);
        DB::table('sub_categories')->insert([
          'id', => '5',
          'name' => 'Node.js',
          'desc' => 'Node.js adalah lingkungan run-time JavaScript open-source, lintas platform yang mengeksekusi kode JavaScript di luar browser.',
          'name_en' => 'Node.js',
          'desc_en' => 'Node.js is an open-source, cross-platform JavaScript run-time environment that executes JavaScript code outside the browser.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '2'
        ]);

        // seeding sub_sub_categories table
        DB::table('sub_sub_categories')->insert([
          'id', => '1',
          'name' => 'Controller',
          'desc' => 'Controller biasanya disimpan di direktori aplikasi / pengontrol, dan direktori ini terdaftar dalam opsi classmap dari file composer.json Anda secara default.',
          'name_en' => 'Controller',
          'desc_en' => 'Controllers are typically stored in the app/controllers directory, and this directory is registered in the classmap option of your composer.json file by default.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_sub_categories' => '4'
        ]);
        DB::table('sub_sub_categories')->insert([
          'id', => '2',
          'name' => 'Views',
          'desc' => 'Views berisi HTML yang disajikan oleh aplikasi Anda dan memisahkan logika controller / aplikasi dari logika presentasi Anda. Tampilan disimpan di direktori sumber daya / tampilan.',
          'name_en' => 'Views',
          'desc_en' => 'Views contain the HTML served by your application and separate your controller / application logic from your presentation logic. Views are stored in the resources/views directory.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_sub_categories' => '4'
        ]);
        DB::table('sub_sub_categories')->insert([
          'id', => '2',
          'name' => 'Template Blade',
          'desc' => 'Blade adalah mesin templating yang sederhana namun bertenaga dengan Laravel. Tidak seperti mesin template PHP populer lainnya, Blade tidak membatasi Anda untuk menggunakan kode PHP biasa dalam tampilan Anda. Bahkan, semua pandangan Blade dikompilasi ke dalam kode PHP biasa dan di-cache sampai diubah, yang berarti Blade menambahkan nol pada aplikasi Anda. File tampilan blade menggunakan ekstensi file .blade.php dan biasanya disimpan di direktori sumber daya / tampilan.',
          'name_en' => 'Blade Templates',
          'desc_en' => 'Blade is the simple, yet powerful templating engine provided with Laravel. Unlike other popular PHP templating engines, Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified, meaning Blade adds essentially zero overhead to your application. Blade view files use the .blade.php file extension and are typically stored in the resources/views directory.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_sub_categories' => '4'
        ]);

        // seeding pages table
        DB::table('pages')->insert([
          'id', => '1',
          'name' => 'Home',
          'name_en' => 'Home',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('pages')->insert([
          'id', => '2',
          'name' => 'Berita',
          'name_en' => 'News',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('pages')->insert([
          'id', => '3',
          'name' => 'Pelajaran',
          'name_en' => 'Leason',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('pages')->insert([
          'id', => '4',
          'name' => 'Tentang',
          'name_en' => 'About',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('pages')->insert([
          'id', => '5',
          'name' => 'Kontak',
          'name_en' => 'Contact',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // seeding post_status table
        DB::table('post_status')->insert([
          'id', => '1',
          'name' => 'Published',
          'name_en' => 'Diterbitkan'
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('post_status')->insert([
          'id', => '2',
          'name' => 'Draft',
          'name_en' => 'Draf',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('post_status')->insert([
          'id', => '3',
          'name' => 'Pending',
          'name_en' => 'Pending',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('post_status')->insert([
          'id', => '4',
          'name' => 'Auto Draft',
          'name_en' => 'Draf Otomatis',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('post_status')->insert([
          'id', => '1',
          'name' => 'Trash',
          'name_en' => 'Dihapus',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
