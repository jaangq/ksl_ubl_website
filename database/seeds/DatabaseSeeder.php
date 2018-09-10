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
          'id' => '1',
          'name' => 'admin',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('user_roles')->insert([
           'id' => '2',
           'name' => 'user',
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // seeding users table
        DB::table('users')->insert([
          'name' => 'Ling Ling',
          'username' => 'lingling',
          'email' => 'lingling@gmail.com',
          'password' => bcrypt('lingling'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_user_roles' => '1'
        ]);
        DB::table('users')->insert([
          'name' => 'Kagura',
          'username' => 'kagura',
          'email' => 'kagura@gmail.com',
          'password' => bcrypt('kagura'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_user_roles' => '2'
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
        DB::table('tags')->insert([
          'name' => 'Tutorial',
          'desc' => 'Tutorial',
          'name_en' => 'Tutorial',
          'desc_en' => 'Tutorial',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
          'name' => 'SFD',
          'desc' => 'Software Freedom Day',
          'name_en' => 'SFD',
          'desc_en' => 'Software Freedom Day',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
          'name' => 'DFD',
          'desc' => 'Document Freedom Day',
          'name_en' => 'DFD',
          'desc_en' => 'Document Freedom Day',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
          'name' => 'Android',
          'desc' => 'Android',
          'name_en' => 'Android',
          'desc_en' => 'Android',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
          'name' => 'Python',
          'desc' => 'Python',
          'name_en' => 'Python',
          'desc_en' => 'Python',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
          'name' => 'imagemagick',
          'desc' => 'imagemagick',
          'name_en' => 'imagemagick',
          'desc_en' => 'imagemagick',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        // seeding categories table
        DB::table('categories')->insert([
          'id' => '1',
          'name' => 'Linux',
          'desc' => 'Linux adalah keluarga dari sistem operasi perangkat lunak bebas dan sumber terbuka yang dibangun di sekitar kernel Linux.',
          'name_en' => 'Linux',
          'desc_en' => 'Linux is a family of free and open-source software operating systems built around the Linux kernel.',
          'icon' => 'fab fa-linux',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id' => '2',
          'name' => 'Jaringan Komputer',
          'desc' => 'Networking, juga dikenal sebagai jaringan komputer, adalah praktik pengangkutan dan pertukaran data antara node melalui media bersama dalam suatu sistem informasi.',
          'name_en' => 'Networking',
          'desc_en' => 'Networking, also known as computer networking, is the practice of transporting and exchanging data between nodes over a shared medium in an information system.',
          'icon' => 'fas fa-sitemap',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id' => '3',
          'name' => 'Desain',
          'desc' => 'Desain adalah pembuatan rencana atau konvensi untuk pembangunan objek, sistem atau interaksi manusia yang dapat diukur (seperti dalam cetak biru arsitektur, gambar teknik, proses bisnis, diagram sirkuit, dan pola jahit). Desain memiliki konotasi yang berbeda di berbagai bidang (lihat disiplin desain di bawah). Dalam beberapa kasus, konstruksi langsung suatu objek (seperti dalam gerabah, teknik, manajemen, pengkodean, dan desain grafis) juga dianggap menggunakan pemikiran desain.',
          'name_en' => 'Design',
          'desc_en' => 'Design is the creation of a plan or convention for the construction of an object, system or measurable human interaction (as in architectural blueprints, engineering drawings, business processes, circuit diagrams, and sewing patterns). Design has different connotations in different fields (see design disciplines below). In some cases, the direct construction of an object (as in pottery, engineering, management, coding, and graphic design) is also considered to use design thinking. ',
          'icon' => 'fas fa-paint-brush',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id' => '4',
          'name' => 'Pemrograman',
          'desc' => 'Pemrograman adalah proses membuat serangkaian instruksi yang memberi tahu komputer cara melakukan suatu tugas.',
          'name_en' => 'Programming',
          'desc_en' => 'Programming is the process of creating a set of instructions that tell a computer how to perform a task.',
          'icon' => 'fas fa-code',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        // seeding sub_categories table
        DB::table('sub_categories')->insert([
          'id' => '1',
          'name' => 'Debian',
          'desc' => 'Debian adalah distribusi yang menekankan perangkat lunak bebas. Ini mendukung banyak platform perangkat keras. Debian dan distribusi berdasarkan itu menggunakan format paket .deb dan manajer paket dpkg dan frontendnya (seperti apt-get atau synaptic)',
          'name_en' => 'Debian',
          'desc_en' => 'Debian is a distribution that emphasizes free software. It supports many hardware platforms. Debian and distributions based on it use the .deb package format and the dpkg package manager and its frontends (such as apt-get or synaptic)',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '1'
        ]);
        DB::table('sub_categories')->insert([
          'id' => '2',
          'name' => 'Arch Linux',
          'desc' => 'Arch Linux adalah distribusi GNU / Linux yang dikembangkan secara independen, x86-64 yang bertujuan untuk menyediakan versi stabil terbaru dari sebagian besar perangkat lunak dengan mengikuti model peluncuran-bergulir. Instalasi default adalah sistem basis minimal, dikonfigurasi oleh pengguna untuk hanya menambahkan apa yang diminta dengan sengaja.',
          'name_en' => 'Arch Linux',
          'desc_en' => 'Arch Linux is an independently developed, x86-64 general-purpose GNU/Linux distribution that strives to provide the latest stable versions of most software by following a rolling-release model. The default installation is a minimal base system, configured by the user to only add what is purposely required. ',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '1'
        ]);
        DB::table('sub_categories')->insert([
          'id' => '3',
          'name' => 'Fedora',
          'desc' => 'Fedora adalah distribusi Linux yang dikembangkan oleh Proyek Fedora yang didukung masyarakat dan disponsori oleh Red Hat. Fedora berisi perangkat lunak yang didistribusikan di bawah berbagai lisensi sumber terbuka dan gratis dan bertujuan untuk menjadi terdepan dari teknologi tersebut. Fedora adalah sumber hulu dari distribusi Red Hat Enterprise Linux komersial.',
          'name_en' => 'Fedora',
          'desc_en' => 'Fedora is a Linux distribution developed by the community-supported Fedora Project and sponsored by Red Hat. Fedora contains software distributed under various free and open-source licenses and aims to be on the leading edge of such technologies. Fedora is the upstream source of the commercial Red Hat Enterprise Linux distribution.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '1'
        ]);
        DB::table('sub_categories')->insert([
          'id' => '4',
          'name' => 'Laravel',
          'desc' => 'Laravel adalah framework web PHP gratis, open-source, yang dibuat oleh Taylor Otwell dan ditujukan untuk pengembangan aplikasi web mengikuti pola arsitektur model-view – controller dan berdasarkan Symfony.',
          'name_en' => 'Laravel',
          'desc_en' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '4'
        ]);
        DB::table('sub_categories')->insert([
          'id' => '5',
          'name' => 'Node.js',
          'desc' => 'Node.js adalah lingkungan run-time JavaScript open-source, lintas platform yang mengeksekusi kode JavaScript di luar browser.',
          'name_en' => 'Node.js',
          'desc_en' => 'Node.js is an open-source, cross-platform JavaScript run-time environment that executes JavaScript code outside the browser.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '4'
        ]);

        DB::table('sub_categories')->insert([
          'id' => '6',
          'name' => 'Python',
          'desc' => 'Python adalah bahasa pemrograman interpretatif multiguna dengan filosofi perancangan yang berfokus pada tingkat keterbacaan kode.',
          'name_en' => 'Python',
          'desc_en' => 'Python is a multipurpose interpretive programming language with a design philosophy that focuses on the level of code readability.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_categories' => '4'
        ]);
        // seeding sub_sub_categories table
        DB::table('sub_sub_categories')->insert([
          'id' => '1',
          'name' => 'Controller',
          'desc' => 'Controller biasanya disimpan di direktori aplikasi / pengontrol, dan direktori ini terdaftar dalam opsi classmap dari file composer.json Anda secara default.',
          'name_en' => 'Controller',
          'desc_en' => 'Controllers are typically stored in the app/controllers directory, and this directory is registered in the classmap option of your composer.json file by default.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_sub_categories' => '4'
        ]);
        DB::table('sub_sub_categories')->insert([
          'id' => '2',
          'name' => 'Views',
          'desc' => 'Views berisi HTML yang disajikan oleh aplikasi Anda dan memisahkan logika controller / aplikasi dari logika presentasi Anda. Tampilan disimpan di direktori sumber daya / tampilan.',
          'name_en' => 'Views',
          'desc_en' => 'Views contain the HTML served by your application and separate your controller / application logic from your presentation logic. Views are stored in the resources/views directory.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_sub_categories' => '4'
        ]);
        DB::table('sub_sub_categories')->insert([
          'id' => '3',
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
          'id' => '1',
          'name' => 'Home',
          'name_en' => 'Home',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('pages')->insert([
          'id' => '2',
          'name' => 'Berita',
          'name_en' => 'News',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('pages')->insert([
          'id' => '3',
          'name' => 'Pelajaran',
          'name_en' => 'Lessons',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('pages')->insert([
          'id' => '4',
          'name' => 'Tentang',
          'name_en' => 'About',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('pages')->insert([
          'id' => '5',
          'name' => 'Kontak',
          'name_en' => 'Contact',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('pages')->insert([
          'id' => '6',
          'name' => 'Posts',
          'name_en' => 'Posts',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        // seeding post_status table
        DB::table('post_status')->insert([
          'id' => '1',
          'name' => 'Published',
          'name_en' => 'Diterbitkan',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('post_status')->insert([
          'id' => '2',
          'name' => 'Draft',
          'name_en' => 'Draf',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('post_status')->insert([
          'id' => '3',
          'name' => 'Pending',
          'name_en' => 'Pending',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('post_status')->insert([
          'id' => '4',
          'name' => 'Auto Draft',
          'name_en' => 'Draf Otomatis',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('post_status')->insert([
          'id' => '5',
          'name' => 'Trash',
          'name_en' => 'Dihapus',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        // seeding posts table
        // seeding tag_posts table




        // // seeding file_types table
        // DB::table('file_types')->insert([
        //   'id' => '1',
        //   'name' => 'gambar',
        //   'name_en' => 'image',
        //   'file_formats' => 'jpg'
        // ]);
        //
        // DB::table('file_types')->insert([
        //   'id' => '2',
        //   'name' => 'gambar',
        //   'name_en' => 'image',
        //   'file_formats' => 'png'
        // ]);
        //
        // DB::table('file_types')->insert([
        //   'id' => '3',
        //   'name' => 'video',
        //   'name_en' => 'video',
        //   'file_formats' => 'mp4'
        // ]);

        // seeding website_text
        DB::table('website_text')->insert([
          'id' => '1',
          'label' => 'nomor telepon',
          'label_en' => 'phone number',
          'content' => '+6281388889999',
          'content_en' => '+6281388889999',
          'prefix' => 'contact',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '2',
          'label' => 'email',
          'label_en' => 'email',
          'content' => 'admin@ksl-ubl.com',
          'content_en' => 'admin@ksl-ubl.com',
          'prefix' => 'contact',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '3',
          'label' => 'alamat',
          'label_en' => 'address',
          'content' => 'Jl.Kenangan Di Sore Hari',
          'content_en' => 'Jl.Kenangan Di Sore Hari',
          'prefix' => 'address',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '4',
          'label' => 'facebook',
          'label_en' => 'facebook',
          'content' => 'https://www.facebook.com/ksl-ubl',
          'content_en' => 'https://www.facebook.com/ksl-ubl',
          'prefix' => 'sosmed',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '5',
          'label' => 'twitter',
          'label_en' => 'twitter',
          'content' => 'https://www.twitter.com/ksl-ubl',
          'content_en' => 'https://www.twitter.com/ksl-ubl',
          'prefix' => 'sosmed',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '6',
          'label' => 'youtube',
          'label_en' => 'youtube',
          'content' => 'https://www.youtube.com/ksl-ubl',
          'content_en' => 'https://www.youtube.com/ksl-ubl',
          'prefix' => 'sosmed',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '7',
          'label' => 'instagram',
          'label_en' => 'instagram',
          'content' => 'https://www.instagram.com/ksl-ubl/',
          'content_en' => 'https://www.instagram.com/ksl-ubl/',
          'prefix' => 'sosmed',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '8',
          'label' => 'google+',
          'label_en' => 'google+',
          'content' => 'https://plus.google.com/114787876386455292333',
          'content_en' => 'https://plus.google.com/114787876386455292333',
          'prefix' => 'sosmed',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_text')->insert([
          'id' => '9',
          'label' => 'Home Quotes',
          'label_en' => 'Home Quotes',
          'content' => '<p>The Linux philosophy is \'<strong>Laugh in the face of danger</strong>\'. <strong>Oops. Wrong One.</strong> \'<strong>Do it yourself</strong>\'. <strong>Yes, that\'s it.</strong></p><cite>Linux Torvalds</cite>',
          'content_en' => '<p>The Linux philosophy is \'<strong>Laugh in the face of danger</strong>\'. <strong>Oops. Wrong One.</strong> \'<strong>Do it yourself</strong>\'. <strong>Yes, that\'s it.</strong></p><cite>Linux Torvalds</cite>',
          'prefix' => 'editable',
          'id_pages' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '10',
          'label' => 'Apa Itu KSL dan Apa Yang Kami Lakukan di KSL',
          'label_en' => 'What Is And What We Do On KSL',
          'content' => 'Apa Itu KSL dan Apa Yang Kami Lakukan di KSL',
          'content_en' => 'What Is And What We Do On KSL',
          'prefix' => '',
          'id_pages' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '11',
          'label' => 'Text For What Is And What We Do On KSL',
          'label_en' => 'Teks Untuk What Is And What We Do On KSL',
          'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, if you want to learn more about us just click on <a class="about-page-link" href="http://127.0.0.1:8000/about">About Page</a> .</p>',
          'content_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, if you want to learn more about us just click on <a class="about-page-link" href="http://127.0.0.1:8000/about">About Page</a> .</p>',
          'prefix' => 'editable',
          'id_pages' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '12',
          'label' => 'Selain Linux Kami Juga Belajar',
          'label_en' => 'Besides Linux We Also Learn',
          'content' => 'Selain Linux Kami Juga Belajar',
          'content_en' => 'Besides Linux We Also Learn',
          'prefix' => '',
          'id_pages' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '13',
          'label' => 'Jadilah Keluarga Kami dan Belajar Bersama Kami',
          'label_en' => 'Be Our Family and Learn With Us',
          'content' => 'Jadilah Keluarga Kami dan Belajar Bersama Kami',
          'content_en' => 'Be Our Family and Learn With Us',
          'prefix' => '',
          'id_pages' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '14',
          'label' => 'Text For Be Our Family and Learn With Us',
          'label_en' => 'Teks Untuk Be Our Family and Learn With Us',
          'content' => '<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>',
          'content_en' => '<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>',
          'prefix' => 'editable',
          'id_pages' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '15',
          'label' => 'Ayo Lihat Berita Terbaru Kami',
          'label_en' => 'Let\'s See the Latest News From Us',
          'content' => 'Ayo Lihat Berita Terbaru Kami',
          'content_en' => 'Let\'s See the Latest News From Us',
          'prefix' => '',
          'id_pages' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '16',
          'label' => 'Paling Terbaru',
          'label_en' => 'Most Recent',
          'content' => 'Paling Terbaru',
          'content_en' => 'Most Recent',
          'prefix' => '',
          'id_pages' => '6',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '17',
          'label' => 'Hanya Berita',
          'label_en' => 'News Only',
          'content' => 'Hanya Berita',
          'content_en' => 'News Only',
          'prefix' => '',
          'id_pages' => '6',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '18',
          'label' => 'Pelajaran Saja',
          'label_en' => 'Lessons Only',
          'content' => 'Pelajaran Saja',
          'content_en' => 'Lessons Only',
          'prefix' => '',
          'id_pages' => '6',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '19',
          'label' => 'Populer',
          'label_en' => 'Popular',
          'content' => 'Populer',
          'content_en' => 'Popular',
          'prefix' => '',
          'id_pages' => '6',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '20',
          'label' => 'Paling Banyak Dilihat',
          'label_en' => 'Most Viewed',
          'content' => 'Paling Banyak Dilihat',
          'content_en' => 'Most Viewed',
          'prefix' => '',
          'id_pages' => '6',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '21',
          'label' => 'Text Input Cari Postingan',
          'label_en' => 'Search Posts Text Input',
          'content' => 'Cari Postingan',
          'content_en' => 'Search Posts',
          'prefix' => '',
          'id_pages' => '6',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '22',
          'label' => 'Ayo Belajar Bersama Dengan Kami',
          'label_en' => 'Let\'s Learn Together With Us',
          'content' => 'Ayo Belajar Bersama Dengan Kami',
          'content_en' => 'Let\'s Learn Together With Us',
          'prefix' => '',
          'id_pages' => '3',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '23',
          'label' => 'Apa itu KSL',
          'label_en' => 'What is KSL',
          'content' => 'Apa itu KSL',
          'content_en' => 'What is KSL',
          'prefix' => '',
          'id_pages' => '4',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '24',
          'label' => 'Teks Untuk Apa itu KSL',
          'label_en' => 'Text For What is KSL',
          'content' => '<div class="p-5">
                          <img src="http://127.0.0.1:8000/storage/dummy_images/what_is_ksl.png" alt="" class="img img-fluid">
                        </div>
                        <p class="text-justify">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p class="text-justify">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p><br><br>',
          'content_en' => '<div class="p-5">
                              <img src="http://127.0.0.1:8000/storage/dummy_images/what_is_ksl.png" alt="" class="img img-fluid">
                            </div>
                            <p class="text-justify">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                            <p class="text-justify">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p><br><br>',
          'prefix' => 'editable',
          'id_pages' => '4',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '25',
          'label' => 'Apa yang Kami Lakukan di KSL',
          'label_en' => 'What Do We Do on KSL ?',
          'content' => 'Apa yang Kami Lakukan di KSL',
          'content_en' => 'What Do We Do on KSL ?',
          'prefix' => '',
          'id_pages' => '4',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '26',
          'label' => 'Teks Untuk Apa yang Kami Lakukan di KSL',
          'label_en' => 'Text For What Do We Do on KSL ?',
          'content' => '<div class="px-5 pb-5 pt-3">
                          <img class="img img-fluid" src="http://127.0.0.1:8000/storage/dummy_images/people-coffee-notes-tea.jpg" alt="">
                        </div>
                        <p class="text-justify">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p class="text-justify">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p><br><br>',
          'content_en' => '<div class="px-5 pb-5 pt-3">
                            <img class="img img-fluid" src="http://127.0.0.1:8000/storage/dummy_images/people-coffee-notes-tea.jpg" alt="">
                          </div>
                          <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </p>
                          <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </p><br><br>',
          'prefix' => 'editable',
          'id_pages' => '4',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '27',
          'label' => 'Tim Kami (Struktur Organisasi Kami)',
          'label_en' => 'Our Team (Our Organizational Structure)',
          'content' => 'Tim Kami (Struktur Organisasi Kami)',
          'content_en' => 'Our Team (Our Organizational Structure)',
          'prefix' => '',
          'id_pages' => '4',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '28',
          'label' => 'Teks Untuk Apa yang Kami Lakukan di KSL (Struktur Organisasi Kami)',
          'label_en' => 'Text For Our Team (Our Organizational Structure)',
          'content' => '<div class="p-5">
                          <img src="http://127.0.0.1:8000/storage/dummy_images/fam.png" alt="" class="img img-fluid border">
                        </div>
                        <p class="text-justify">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p class="text-justify">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p><br><br>',
          'content_en' => '<div class="p-5">
                            <img src="http://127.0.0.1:8000/storage/dummy_images/fam.png" alt="" class="img img-fluid border">
                          </div>
                          <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </p>
                          <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </p><br><br>',
          'prefix' => 'editable',
          'id_pages' => '4',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '29',
          'label' => 'Partner Kami',
          'label_en' => 'Our Partners',
          'content' => 'Partner Kami',
          'content_en' => 'Our Partners',
          'prefix' => '',
          'id_pages' => '4',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '30',
          'label' => 'Teks Untuk Partner Kami',
          'label_en' => 'Text For Our Partners ',
          'content' => '<p class="text-justify">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <div class="p-5">
                          <img src="http://127.0.0.1:8000/storage/dummy_images/logos-about.png" alt="" class="img img-fluid">
                        </div>',
          'content_en' => '<p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </p>
                          <div class="p-5">
                            <img src="http://127.0.0.1:8000/storage/dummy_images/logos-about.png" alt="" class="img img-fluid">
                          </div>',
          'prefix' => 'editable',
          'id_pages' => '4',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '31',
          'label' => 'Kontak Kami',
          'label_en' => 'Contact Us',
          'content' => 'Kontak Kami',
          'content_en' => 'Contact Us',
          'prefix' => '',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '32',
          'label' => 'Judul Form Kontak',
          'label_en' => 'Contact Form Title',
          'content' => 'Jangan Ragu Tuk Menghubungi Kami, Kami Sangat Senang Menerima Pesan Darimu',
          'content_en' => 'Do Not Hesitate To Contact Us, We Are Happy To Receive Messages From You',
          'prefix' => '',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('website_text')->insert([
          'id' => '33',
          'label' => 'Judul Informasi Kontak',
          'label_en' => 'Contact Information Title',
          'content' => 'Dan Jika Kamu Butuh Sesuatu, Hubungi Saja Kami Melalui Informasi Kontak Di Bawah Ini',
          'content_en' => 'And If You Need Something, Just Contact Us Through The Contact Information Below',
          'prefix' => '',
          'id_pages' => '5',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        // seeding uploaded_files
        DB::table('uploaded_files')->insert( [
        'id'=>1,
        'name'=>'inkscape.png',
        'mime'=>'image/png',
        'size'=>45561,
        'hash'=>'l1_aW1hZ2VzL2lua3NjYXBlLnBuZw',
        'created_at'=>'2018-09-07 08:07:16',
        'updated_at'=>'2018-09-07 08:07:16',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>2,
        'name'=>'Picture1.png',
        'mime'=>'image/png',
        'size'=>69816,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmUxLnBuZw',
        'created_at'=>'2018-09-07 08:09:10',
        'updated_at'=>'2018-09-07 08:09:10',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>3,
        'name'=>'Picture3.png',
        'mime'=>'image/png',
        'size'=>91450,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmUzLnBuZw',
        'created_at'=>'2018-09-07 08:10:02',
        'updated_at'=>'2018-09-07 08:10:02',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>4,
        'name'=>'Picture2.png',
        'mime'=>'image/png',
        'size'=>69715,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmUyLnBuZw',
        'created_at'=>'2018-09-07 08:10:11',
        'updated_at'=>'2018-09-07 08:10:11',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>5,
        'name'=>'Picture4.png',
        'mime'=>'image/png',
        'size'=>174137,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmU0LnBuZw',
        'created_at'=>'2018-09-07 08:11:52',
        'updated_at'=>'2018-09-07 08:11:52',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>6,
        'name'=>'Picture5.png',
        'mime'=>'image/png',
        'size'=>174999,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmU1LnBuZw',
        'created_at'=>'2018-09-07 08:12:34',
        'updated_at'=>'2018-09-07 08:12:34',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>7,
        'name'=>'Picture6.png',
        'mime'=>'image/png',
        'size'=>245100,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmU2LnBuZw',
        'created_at'=>'2018-09-07 08:14:16',
        'updated_at'=>'2018-09-07 08:14:16',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>8,
        'name'=>'Picture7.png',
        'mime'=>'image/png',
        'size'=>216402,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmU3LnBuZw',
        'created_at'=>'2018-09-07 08:14:56',
        'updated_at'=>'2018-09-07 08:14:56',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>9,
        'name'=>'Picture8.png',
        'mime'=>'image/png',
        'size'=>249649,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmU4LnBuZw',
        'created_at'=>'2018-09-07 08:17:02',
        'updated_at'=>'2018-09-07 08:17:02',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>10,
        'name'=>'Picture9.png',
        'mime'=>'image/png',
        'size'=>135830,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmU5LnBuZw',
        'created_at'=>'2018-09-07 08:17:37',
        'updated_at'=>'2018-09-07 08:17:37',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>11,
        'name'=>'Picture10.png',
        'mime'=>'image/png',
        'size'=>102052,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmUxMC5wbmc',
        'created_at'=>'2018-09-07 08:18:18',
        'updated_at'=>'2018-09-07 08:18:18',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>12,
        'name'=>'Picture11.png',
        'mime'=>'image/png',
        'size'=>181863,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmUxMS5wbmc',
        'created_at'=>'2018-09-07 08:18:56',
        'updated_at'=>'2018-09-07 08:18:56',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>13,
        'name'=>'Picture12.png',
        'mime'=>'image/png',
        'size'=>167439,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmUxMi5wbmc',
        'created_at'=>'2018-09-07 08:19:39',
        'updated_at'=>'2018-09-07 08:19:39',
        'id_users'=>1
        ] );
        DB::table('uploaded_files')->insert( [
        'id'=>14,
        'name'=>'Picture13.png',
        'mime'=>'image/png',
        'size'=>162282,
        'hash'=>'l1_aW1hZ2VzL1BpY3R1cmUxMy5wbmc',
        'created_at'=>'2018-09-07 08:20:14',
        'updated_at'=>'2018-09-07 08:20:14',
        'id_users'=>1
        ] );

    }
}
