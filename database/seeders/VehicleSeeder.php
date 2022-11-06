<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            [
                'uuid' => '0014133a-7d52-4ceb-92e2-10518873f792',
                'company_uuid' => 'dd04133a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'lincoln-limo-las-vegas',
                'name' => "Lincoln Limo",
                'title' => "8 Passenger Lincoln Limo Rental Las Vegas",
                'meta' => "Our luxury limo will allow you to ride in style and comfort. It is ideal for weddings, groups, proms, bachelor…",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 8,
                'images' => json_encode(['lincoln-limo-las-vegas.png','lincoln-limo-las-vegas-1.jpeg','lincoln-limo-las-vegas-2.jpeg','lincoln-limo-las-vegas-3.jpeg','lincoln-limo-las-vegas-4.jpeg','lincoln-limo-las-vegas-5.jpeg','lincoln-limo-las-vegas-6.jpeg']),
                'type' => 'limo',
                'description' => "Our luxury limo will allow you to ride in style and comfort. It is ideal for weddings, groups, proms, bachelor or bachelorette parties, and special nights on the town. This vehicle can comfortably accommodate up to 8 passengers. Your trip will include top of the line service from one of the best black-tie chauffeurs in town.",
            ],

            [
                'uuid' => '0024133a-7d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04133a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'mercedes-sprinter-limo-las-vegas',
                'name' => "Mercedes Sprinter Party Bus",
                'title' => "15 Passenger Mercedes Sprinter Party Bus Rental Las Vegas",
                'meta' => "Luxury Mercedes Sprinter van available for rental with a driver in Las Vegas. Very comfortable and spacious for your next party.",
                'price' => 17000,
                'price_weekend' => 17000,
                'capacity' => 15,
                'images' => json_encode(['mercedes-sprinter-las-vegas.png', 'mercedes-sprinter-party-bus-1.jpeg','mercedes-sprinter-party-bus-2.jpeg','mercedes-sprinter-party-bus-3.jpeg','mercedes-sprinter-party-bus-4.jpeg','mercedes-sprinter-party-bus-5.jpeg','mercedes-sprinter-party-bus-5.jpeg']),
                'type' => 'bus',
                'description' => "<p>One of the most popular rental choices in Las Vegas for parties under 16 passengers. Mercedes Sprinter Van is very affordable and has been designed with high back leather seating for comfort.</p><p> It is the perfect pick up vehicle for airport transportation, weddings or club crawls. Why take multiple cars when your party can all have fun in one Mercedes Sprinter.</p><p>This car features include Luxury Leather Seating, Stereo with iPod/MP3/Bluetooth inputs, Fiber Optic and Neon Lighting, Privacy Partition, and Passenger Controls. It also includes an un-stocked bar which we can stock for you upon request.</p><p>Your rental includes a professional black tie chauffeur.</p>",
            ],

            [
                'uuid' => '0034133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04133a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'party-bus-limo-las-vegas',
                'name' => "26 Passenger Party Bus",
                'title' => "26 Passenger Party Bus Rental in Las Vegas",
                'meta' => "This huge Ford party bus is a perfect rental with a driver in Las Vegas. Very comfortable and spacious with a pole in the middle for entertainment.",
                'price' => 23000,
                'price_weekend' => 2300,
                'capacity' => 26,
                'images' => json_encode(['party-bus-las-vegas-1.png', 'party-bus-las-vegas-2.jpeg', 'party-bus-las-vegas-3.jpeg', 'party-bus-las-vegas-4.jpeg', 'party-bus-las-vegas-5.jpeg', 'party-bus-las-vegas-6.jpeg' , 'party-bus-las-vegas-7.jpeg']),
                'type' => 'bus',
                'description' => "This decked out party bus will get your to your destination in style and comfort. Perfect for your large group.",
            ],

            [
                'uuid' => '0044133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04133a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'party-bus-limo-las-vegas-33',
                'name' => "33 Passenger Party Bus",
                'title' => "33 Passenger Party Bus Rental in Las Vegas",
                'meta' => "Gigantic and decked out party bus perfect for your large party. Can fit up to 33 people, 2 strip poles for dancers, a bar and neon lighting.",
                'price' => 30000,
                'price_weekend' => 30000,
                'capacity' => 33,
                'images' => json_encode(['36-passenger-party-bus-las-vegas.png', '36-passenger-party-bus-las-vegas-1.jpeg', '36-passenger-party-bus-las-vegas-2.jpeg', '36-passenger-party-bus-las-vegas-3.jpeg','36-passenger-party-bus-las-vegas-4.jpeg','36-passenger-party-bus-las-vegas-5.jpeg','36-passenger-party-bus-las-vegas-6.jpeg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0054133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04133a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'party-bus-limo-las-vegas-42',
                'name' => "42 Passenger Party Bus",
                'title' => "42 Passenger Party Bus & Limo Coach Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 35000,
                'price_weekend' => 35000,
                'capacity' => 42,
                'images' => json_encode(['42-passenger-party-bus-las-vegas.png', '42-passenger-party-bus-las-vegas-1.jpeg','42-passenger-party-bus-las-vegas-2.jpeg','42-passenger-party-bus-las-vegas-3.jpeg','42-passenger-party-bus-las-vegas-4.jpeg','42-passenger-party-bus-las-vegas-5.jpeg','42-passenger-party-bus-las-vegas-6.jpeg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0064133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'mercedes-sprinter-party-bus',
                'name' => "16 Passenger Mercedes Sprinter Party Bus",
                'title' => "16 Passenger Mercedes Sprinter Party Bus Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 9900,
                'price_weekend' => 9900,
                'capacity' => 16,
                'images' => json_encode(['mercedes-sprinter-party-bus-1.jpg','mercedes-sprinter-party-bus-2.jpg','mercedes-sprinter-party-bus-3.jpg','mercedes-sprinter-party-bus-4.jpg','mercedes-sprinter-party-bus-5.jpg','mercedes-sprinter-party-bus-6.jpg','mercedes-sprinter-party-bus-7.jpg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0074133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'ford-e450-party-bus-las-vegas',
                'name' => "20 Passenger Ford E450 Party Bus",
                'title' => "20 Passenger Ford E450 Party Bus Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 9900,
                'price_weekend' => 9900,
                'capacity' => 20,
                'images' => json_encode(['ford-e450-party-bus-1.jpg','ford-e450-party-bus-2.jpg','ford-e450-party-bus-3.jpg','ford-e450-party-bus-4.jpg','ford-e450-party-bus-5.jpg','ford-e450-party-bus-6.jpg','ford-e450-party-bus-7.jpg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0084133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'ford-f650-party-bus-las-vegas',
                'name' => "18 Passenger Ford F650 Party Bus",
                'title' => "18 Passenger Ford F650 Party Bus Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 12000,
                'price_weekend' => 1200,
                'capacity' => 18,
                'images' => json_encode(['ford-f650-party-bus-1.jpg','ford-f650-party-bus-2.jpg','ford-f650-party-bus-3.jpg','ford-f650-party-bus-4.jpg','ford-f650-party-bus-5.jpg','ford-f650-party-bus-6.jpg','ford-f650-party-bus-7.jpg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0094133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'ford-f550-party-bus-las-vegas',
                'name' => "28 Passenger Ford F550 Party Bus",
                'title' => "28 Passenger Ford F550 Party Bus Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 15000,
                'price_weekend' => 1500,
                'capacity' => 28,
                'images' => json_encode(['ford-f550-party-bus-1.jpg','ford-f550-party-bus-2.jpg','ford-f550-party-bus-3.jpg','ford-f550-party-bus-4.jpg','ford-f550-party-bus-5.jpg','ford-f550-party-bus-6.jpg','ford-f550-party-bus-7.jpg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0104133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7d52-4ceb-92e2-00518873f792',
                'slug' => 'ford-f750-party-bus-las-vegas',
                'name' => "40 Passenger Ford F750 Party Bus",
                'title' => "40 Passenger Ford F750 Party Bus Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 19500,
                'price_weekend' => 19500,
                'capacity' => 40,
                'images' => json_encode(['ford-f750-party-bus-1.jpg','ford-f750-party-bus-2.jpg','ford-f750-party-bus-3.jpg','ford-f750-party-bus-4.jpg','ford-f750-party-bus-5.jpg','ford-f750-party-bus-6.jpg','ford-f750-party-bus-7.jpg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0114133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-00518873f792',
                'slug' => 'lincoln-navigator-limo',
                'name' => "12 Passenger Lincoln Navigator Limo",
                'title' => "12 Passenger Lincoln Navigator Limousine Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 11500,
                'price_weekend' => 11500,
                'capacity' => 12,
                'images' => json_encode(['lincoln-navigator-limo-las-vegas.jpeg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0124133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-00518873f792',
                'slug' => 'ford-party-bus-las-vegas',
                'name' => "20 Passenger Ford Party Bus",
                'title' => "20 Passenger Ford Party Bus Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 12000,
                'price_weekend' => 12000,
                'capacity' => 20,
                'images' => json_encode(['ford-party-bus-las-vegas.jpeg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0134133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-00518873f792',
                'slug' => '24-person-corporate-bus',
                'name' => "24 Passenger Corporate Charter Bus",
                'title' => "24 Passenger Corporate Charter Bus Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 8000,
                'price_weekend' => 8000,
                'capacity' => 24,
                'images' => json_encode(['corporate-charter-bus.jpeg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0144133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-00518873f792',
                'slug' => '31-passenger-party-bus',
                'name' => "31 Passenger Party Bus",
                'title' => "31 Passenger Party Bus Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 9900,
                'price_weekend' => 9900,
                'capacity' => 31,
                'images' => json_encode(['31-passenger-party-bus.jpeg']),
                'type' => 'bus',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0154133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'pink-cadillac-escalade-limo',
                'name' => "12 Passenger Pink Escalade Limo",
                'title' => "12 Passenger Pink Cadillac Escalade Limo Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 13000,
                'price_weekend' => 13000,
                'capacity' => 12,
                'images' => json_encode(['pink-escallade-limo.jpeg','pink-cadillac-escallade-limo.jpeg']),
                'type' => 'limo',
                'description' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
            ],

            [
                'uuid' => '0164133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'cadillac-escalade-limo-suv',
                'name' => "4 Passenger Cadillac Escalade SUV",
                'title' => "4 Passenger Cadillac Escalade SUV Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 7000,
                'price_weekend' => 7000,
                'capacity' => 4,
                'images' => json_encode(['cadillac-escalade-suv.jpeg','cadillac-escalade-suv-2.jpeg','cadillac-escalade-suv-3.jpeg','cadillac-escalade-suv-4.jpeg']),
                'type' => 'limo',
                'description' => "<div class='max-w-2xl mx-auto rounded-xl overflow-hidden mb-5'> <div class='video-container'> <iframe src='https://www.youtube.com/embed/29JjbSZdJIM' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe> </div></div> <p>Cadillac Escalade is perfect for smaller groups and VIPs who are looking to travel in style and luxury. It gives you absolute privacy with a private chauffeur who can stay with you for a few hours or the entire day. </p><p> The car comes with 22-inch wheels, two additional USB ports for passengers in the second row seating area as well as a panoramic sunroof that extends from front to back over every seat except. </p><p> The Escalade features a large V8 engine and high ground clearance for enhanced off-road capability. It also comes with standard leather upholstery and aluminum roof rails. Most models come with Bose Personal Entertainment System that allows passengers to control their own sound settings using an eight-inch touch screen display and integrated MP3 player. </p>",
            ],

            [
                'uuid' => '0174133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'cadillac-escalade-limo',
                'name' => "10 Passenger Cadillac Escalade Limo",
                'title' => "10 Passenger Cadillac Escalade Limo Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 11000,
                'price_weekend' => 11000,
                'capacity' => 10,
                'images' => json_encode(['cadillac-escalade-limo-1.jpeg','cadillac-escalade-limo-2.jpeg','cadillac-escalade-limo-3.jpeg','cadillac-escalade-limo-4.jpeg']),
                'type' => 'limo',
                'description' => "<p>Cadillac Escalade is perfect for smaller groups and VIPs who are looking to travel in style and luxury. It gives you absolute privacy with a private chauffeur who can stay with you for a few hours or the entire day. </p><p> The car comes with 22-inch wheels, two additional USB ports for passengers in the second row seating area as well as a panoramic sunroof that extends from front to back over every seat except. </p><p> The Escalade features a large V8 engine and high ground clearance for enhanced off-road capability. It also comes with standard leather upholstery and aluminum roof rails. Most models come with Bose Personal Entertainment System that allows passengers to control their own sound settings using an eight-inch touch screen display and integrated MP3 player. </p><div class='max-w-2xl mx-auto rounded-xl overflow-hidden'> <div class='video-container'> <iframe src='https://www.youtube.com/embed/1aX1wGVjGn8' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe> </div></div>",
            ],

            [
                'uuid' => '0184133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'sprinter-party-bus-las-vegas',
                'name' => "12 Passenger Mercedes Sprinter Party Bus",
                'title' => "12 Person Mercedes Sprinter Party Bus Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 11000,
                'price_weekend' => 11000,
                'capacity' => 12,
                'images' => json_encode(['mercedes-sprinter-party-bus-las-vegas-1.jpeg','mercedes-sprinter-party-bus-las-vegas-2.jpeg','mercedes-sprinter-party-bus-las-vegas-3.jpeg','mercedes-sprinter-party-bus-las-vegas-4.jpeg']),
                'type' => 'bus',
                'description' => ''
            ],

            [
                'uuid' => '0194133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'escalade-stretch-limo-las-vegas',
                'name' => "12 Passenger Ultra Stretch Escalade Limo",
                'title' => "12 Passenger Ultra Stretch Escalade Limo Rental Las Vegas",
                'meta' => "Our luxury sprinter limo will allow you to ride in style and comfort. It is ideal for airport transfers, executive…",
                'price' => 13000,
                'price_weekend' => 12000,
                'capacity' => 12,
                'images' => json_encode(['ultra-escalade-limo-las-vegas-1.jpeg','ultra-escalade-limo-las-vegas-2.jpeg','ultra-escalade-limo-las-vegas-3.jpeg']),
                'type' => 'limo',
                'description' => "<div class='max-w-2xl mx-auto rounded-xl overflow-hidden mb-5'> <div class='video-container'> <iframe src='https://www.youtube.com/embed/aiEV23YzOQQ' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe> </div></div>"
            ],


            [
                'uuid' => '0204133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04233a-7j52-4ceb-92e2-20518873f792',
                'slug' => '20-passenger-party-bus-las-vegas',
                'name' => "20 Passenger Party Bus",
                'title' => "20 Passenger Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 19000,
                'price_weekend' => 19000,
                'capacity' => 20,
                'images' => json_encode(['party-bus-las-vegas-1.jpeg','party-bus-las-vegas-2.jpeg','party-bus-las-vegas-3.jpeg']),
                'type' => 'bus',
                'description' => "<div class='max-w-2xl mx-auto rounded-xl overflow-hidden mb-5'> <div class='video-container'> <iframe src='https://www.youtube.com/embed/pUIV8s5KHCI' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe> </div></div>"
            ],

            [
                'uuid' => '0214133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'green-hummer-limo-las-vegas',
                'name' => "20 Passenger Green Hummer Limo",
                'title' => "20 Passenger Green Hummer Limo Rental Las Vegas",
                'meta' => "",
                'price' => 16000,
                'price_weekend' => 16000,
                'capacity' => 20,
                'images' => json_encode(['green-hummer-limo-las-vegas.jpg']),
                'type' => 'limo',
                'description' => ""
            ],

            [
                'uuid' => '0224133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'pink-hummer-limo-las-vegas',
                'name' => "15 Passenger Pink Hummer Limo",
                'title' => "15 Passenger Pink Hummer Limo Rental Las Vegas",
                'meta' => "",
                'price' => 16000,
                'price_weekend' => 16000,
                'capacity' => 15,
                'images' => json_encode(['pink-hummer-limo-las-vegas-1.jpg','pink-hummer-limo-las-vegas-2.jpeg','pink-hummer-limo-las-vegas-3.jpeg','pink-hummer-limo-las-vegas-4.jpeg']),
                'type' => 'limo',
                'description' => ""
            ],


            [
                'uuid' => '0234133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'white-hummer-limo-las-vegas',
                'name' => "15 Passenger White Hummer Limo",
                'title' => "15 Passenger White Hummer Limo Rental Las Vegas",
                'meta' => "",
                'price' => 11000,
                'price_weekend' => 11000,
                'capacity' => 15,
                'images' => json_encode(['white-hummer-limo-las-vegas.jpg']),
                'type' => 'limo',
                'description' => ""
            ],

            [
                'uuid' => '0244133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'black-hummer-limo-las-vegas',
                'name' => "15 Passenger Black Hummer Limo",
                'title' => "15 Passenger Black Hummer Limo Rental Las Vegas",
                'meta' => "",
                'price' => 12500,
                'price_weekend' => 12500,
                'capacity' => 15,
                'images' => json_encode(['black-hummer-limo-las-vegas.jpg']),
                'type' => 'limo',
                'description' => ""
            ],

            [
                'uuid' => '0254133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'cadillac-escalade-suv-las-vegas',
                'name' => "6 Passenger Cadillac Escalade SUV",
                'title' => "6 Passenger Cadillac Escalade SUV Rental Las Vegas",
                'meta' => "",
                'price' => 6500,
                'price_weekend' => 6500,
                'capacity' => 6,
                'images' => json_encode(['cadillac-escalade-suv-las-vegas.jpg']),
                'type' => 'limo',
                'description' => ""
            ],

            [
                'uuid' => '0264133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283a-7j52-4ceb-92e2-20518873f792',
                'slug' => 'cadillac-escalade-stretch-limo-las-vegas',
                'name' => "19 Passenger Cadillac Escalade Stretch Limo",
                'title' => "19 Passenger Cadillac Escalade Stretch Limo Rental Las Vegas",
                'meta' => "",
                'price' => 12500,
                'price_weekend' => 12500,
                'capacity' => 19,
                'images' => json_encode(['white-escalade-stretch-limo.jpg']),
                'type' => 'limo',
                'description' => ""
            ],

            [
                'uuid' => '0274133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283a-7j52-4ceb-92e2-20518873f792',
                'slug' => '25-passenger-party-bus-las-vegas',
                'name' => "25 Passenger Party Bus",
                'title' => "25 Passenger Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 11500,
                'price_weekend' => 11500,
                'capacity' => 25,
                'images' => json_encode(['25-passenger-party-bus-las-vegas.jpg']),
                'type' => 'bus',
                'description' => ""
            ],

            [
                'uuid' => '0284133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283a-7j52-4ceb-92e2-20518873f792',
                'slug' => '30-passenger-party-bus-las-vegas',
                'name' => "30 Passenger Party Bus",
                'title' => "30 Passenger Ford F650 Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 13500,
                'price_weekend' => 13500,
                'capacity' => 30,
                'images' => json_encode(['30-passenger-party-bus.jpg']),
                'type' => 'bus',
                'description' => ""
            ],

            [
                'uuid' => '0294133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j52-4ceb-92e2-20518873f792',
                'slug' => '37-passenger-party-bus-las-vegas',
                'name' => "37 Passenger Party Bus",
                'title' => "37 Passenger Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 37,
                'images' => json_encode(['37-passenger-party-bus-las-vegas-1.jpeg','37-passenger-party-bus-las-vegas-2.jpeg','37-passenger-party-bus-las-vegas-3.jpeg','37-passenger-party-bus-las-vegas-4.jpeg']),
                'type' => 'bus',
                'description' => ""
            ],


            [
                'uuid' => '0314133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j52-4ceb-92e2-20518873f792',
                'slug' => '38-passenger-party-bus-las-vegas-2',
                'name' => "38 Passenger Party Bus",
                'title' => "38 Passenger Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 38,
                'images' => json_encode(['38-passenger-party-bus-las-vegas-1.jpeg','38-passenger-party-bus-las-vegas-2.jpeg','38-passenger-party-bus-las-vegas-3.jpeg','38-passenger-party-bus-las-vegas-4.jpeg','38-passenger-party-bus-las-vegas-5.jpeg']),
                'type' => 'bus',
                'description' => ""
            ],

            [
                'uuid' => '0324133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j52-4ceb-92e2-20518873f792',
                'slug' => '40-passenger-party-bus-las-vegas',
                'name' => "40 Passenger Party Bus",
                'title' => "40 Passenger Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 40,
                'images' => json_encode(['40-passenger-party-bus-las-vegas-1.jpeg','40-passenger-party-bus-las-vegas-2.jpeg','40-passenger-party-bus-las-vegas-3.jpeg','40-passenger-party-bus-las-vegas-4.jpeg','40-passenger-party-bus-las-vegas-5.jpeg']),
                'type' => 'bus',
                'description' => ""
            ],

            [
                'uuid' => '0334133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j52-4ceb-92e2-20518873f792',
                'slug' => '25-passenger-party-bus-in-las-vegas',
                'name' => "25 Passenger Party Bus",
                'title' => "25 Passenger Black Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 25,
                'images' => json_encode(['25-passenger-party-bus-las-vegas-1.jpeg','25-passenger-party-bus-las-vegas-2.jpeg','25-passenger-party-bus-las-vegas-3.jpeg','25-passenger-party-bus-las-vegas-4.jpeg','25-passenger-party-bus-las-vegas-5.jpeg','25-passenger-party-bus-las-vegas-6.jpeg']),
                'type' => 'bus',
                'description' => ""
            ],

            [
                'uuid' => '0344133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j52-4ceb-92e2-20518873f792',
                'slug' => '36-passenger-party-bus-in-las-vegas',
                'name' => "36 Passenger Party Bus",
                'title' => "36 Passenger Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 36,
                'images' => json_encode(['36-passenger-party-bus-las-vegas-1.jpeg','36-passenger-party-bus-las-vegas-2.jpeg','36-passenger-party-bus-las-vegas-3.jpeg','36-passenger-party-bus-las-vegas-4.jpeg','36-passenger-party-bus-las-vegas-5.jpeg']),
                'type' => 'bus',
                'description' => ""
            ],

            [
                'uuid' => '0354133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j42-4ceb-92e2-20518873f792',
                'slug' => '20-passenger-pink-hummer-limo-las-vegas',
                'name' => "20 Passenger Pink Hummer Limo",
                'title' => "20 Passenger Pink Hummer Limo Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 20,
                'images' => json_encode(['pink-limo-las-vegas-1.jpeg','pink-limo-las-vegas-2.jpeg','pink-limo-las-vegas-3.jpeg','pink-limo-las-vegas-4.jpeg']),
                'type' => 'limo',
                'description' => ""
            ],

            [
                'uuid' => '0304133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j52-4ceb-92e2-20518873f792',
                'slug' => '37-passenger-party-bus-las-vegas-2',
                'name' => "37 Passenger Party Bus",
                'title' => "37 Passenger Black Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 37,
                'images' => json_encode(['37-passenger-party-bus-las-vegas-1.jpeg','37-passenger-party-bus-las-vegas-2.jpeg','37-passenger-party-bus-las-vegas-3.jpeg','37-passenger-party-bus-las-vegas-4.jpeg','37-passenger-party-bus-las-vegas-5.jpeg','37-passenger-party-bus-las-vegas-6.jpeg']),
                'type' => 'bus',
                'description' => ""
            ],

            [
                'uuid' => '0364133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j42-4ceb-92e2-20518873f792',
                'slug' => '14-passenger-mercedes-sprinter-las-vegas',
                'name' => "14 Passenger Sprinter Party Bus",
                'title' => "14 Passenger Mercedes Sprinter Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 14,
                'images' => json_encode(['mercedes-sprinter-party-bus-1.jpg','mercedes-sprinter-party-bus-2.jpg','mercedes-sprinter-party-bus-3.jpg']),
                'type' => 'bus',
                'description' => ""
            ],


            [
                'uuid' => '0374133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j42-4ceb-92e2-20518873f792',
                'slug' => '28-passenger-party-bus-las-vegas',
                'name' => "28 Passenger GMC Party Bus",
                'title' => "28 Passenger GMC Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 28,
                'images' => json_encode(['28-passenger-party-bus-las-vegas-1.jpg','28-passenger-party-bus-las-vegas-2.jpg','28-passenger-party-bus-las-vegas-3.jpg','28-passenger-party-bus-las-vegas-4.jpg','28-passenger-party-bus-las-vegas-5.jpg']),
                'type' => 'bus',
                'description' => ""
            ],



            [
                'uuid' => '0384133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j42-4ceb-92e2-20518873f792',
                'slug' => '30-passenger-gmc-party-bus-las-vegas',
                'name' => "30 Passenger GMC Party Bus",
                'title' => "30 Passenger GMC Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 30,
                'images' => json_encode(['30-passenger-party-bus-las-vegas-1.jpg','30-passenger-party-bus-las-vegas-2.jpg','30-passenger-party-bus-las-vegas-3.jpg','30-passenger-party-bus-las-vegas-4.jpg','30-passenger-party-bus-las-vegas-5.jpg']),
                'type' => 'bus',
                'description' => ""
            ],


            [
                'uuid' => '0394133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j42-4ceb-92e2-20518873f792',
                'slug' => '16-passenger-black-hummer-limo-las-vegas',
                'name' => "16 Passenger Black Hummer Limo",
                'title' => "16 Passenger Black Hummer Limo Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 16,
                'images' => json_encode(['black-hummer-limo-las-vegas-1.jpeg','black-hummer-limo-las-vegas-2.jpeg','black-hummer-limo-las-vegas-3.jpeg','black-hummer-limo-las-vegas-4.jpeg','black-hummer-limo-las-vegas-5.jpeg']),
                'type' => 'limo',
                'description' => ""
            ],


            [
                'uuid' => '0404133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j42-4ceb-92e2-20518873f792',
                'slug' => '8-passenger-lincoln-limo-las-vegas',
                'name' => "8 Passenger Lincoln Limo",
                'title' => "8 Passenger White Lincoln Limo Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 8,
                'images' => json_encode(['lincoln-limo-las-vegas-1.jpeg','lincoln-limo-las-vegas-2.jpeg']),
                'type' => 'limo',
                'description' => ""
            ],


            [
                'uuid' => '0414133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j42-4ceb-92e2-20518873f792',
                'slug' => '30-passenger-white-party-bus-las-vegas',
                'name' => "30 Passenger Party Bus",
                'title' => "30 Passenger White Party Bus Rental Las Vegas",
                'meta' => "",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 30,
                'images' => json_encode(['30-passenger-party-bus.jpeg']),
                'type' => 'bus',
                'description' => ""
            ],

            [
                'uuid' => '0424133a-6d52-4ceb-82e2-10518873f792',
                'company_uuid' => 'dd04283g-7j42-4ceb-92e2-20518873f792',
                'slug' => '40-passenger-white-party-bus-las-vegas',
                'name' => "40 Passenger Party Bus",
                'title' => "40 Passenger Super Large Party Bus Rental Las Vegas",
                'meta' => "Super fun and huge party bus with a dance pool for entertainment. You will have a blast riding through Las Vegas streets with music blasting.",
                'price' => 0,
                'price_weekend' => 0,
                'capacity' => 40,
                'images' => json_encode(['40-passenger-party-bus-1.jpg', '40-passenger-party-bus-2.jpg']),
                'type' => 'bus',
                'description' => ""
            ],


        ]);
    }
}


