<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lorem_ip='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim justo nec sapien condimentum interdum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean vitae nulla eleifend, auctor odio sed, bibendum massa. Phasellus et efficitur sem. Quisque id purus justo. In quis dui velit. Pellentesque vestibulum quam elit, vitae aliquam dui ullamcorper id. Sed eget molestie mauris, eget hendrerit ex. Phasellus sed quam id dui placerat volutpat. Nullam aliquam rhoncus est in faucibus. Fusce quis elementum urna.

        Sed gravida nulla et massa bibendum, vitae blandit turpis laoreet. Vestibulum tortor neque, rhoncus a lobortis et, dictum vitae augue. Donec aliquam dictum consequat. Pellentesque tempus leo quis ullamcorper suscipit. Vestibulum eu posuere felis. Nunc consectetur, urna eu interdum elementum, urna nisl pellentesque est, scelerisque lacinia velit ipsum vel mi. Maecenas varius, nisl non vestibulum vestibulum, magna quam ultricies lacus, nec lacinia dui neque id ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed aliquet libero et ipsum eleifend porttitor. Integer id mattis neque.
        
        Vestibulum porttitor ante ut mollis convallis. Ut sit amet tellus vel nisi consectetur venenatis. Duis fringilla velit nec tincidunt facilisis. Vivamus ultricies sagittis diam, sed scelerisque felis rutrum et. Proin tempus arcu sit amet diam porttitor ultricies. Aenean gravida est ac luctus lobortis. In velit arcu, accumsan vel placerat at, semper a lacus. Suspendisse venenatis ultrices eros, sit amet placerat elit pulvinar a. Aliquam erat volutpat. Sed at tincidunt nibh. Nunc dictum id mauris et sagittis. Pellentesque varius dignissim tortor, nec pretium odio congue id. Vestibulum ut nisl orci. Fusce malesuada auctor velit a eleifend. Proin et lobortis sapien.
        
        In congue rutrum mattis. Quisque nec fermentum magna. Praesent eget orci gravida, luctus felis eu, dictum lorem. Nulla sodales risus a ligula porttitor dignissim. Proin scelerisque mauris vitae diam imperdiet ultrices. Mauris cursus, enim non sagittis lacinia, magna nunc feugiat ex, et venenatis dui erat nec arcu. Aliquam erat volutpat. In mauris justo, vestibulum sed aliquet non, iaculis quis enim.';

        $data_list=[
            ['user_id' => 1,
            'category_id' => 1,
            'title' => 'Hospital Emergency Room Visits 2021',
            'file_path' => 'emergencyroomvisits.zip',
            'tableau_link' => 'https://public.tableau.com/views/RWFDHospitalEmregencyroomvisits/RWFDHospitalsEmrgencyroom?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 1,
            'category_id' => 2,
            'title' => '2016 Gender Pay Gap',
            'file_path' => 'genderpaygap.zip',
            'tableau_link' => 'https://public.tableau.com/views/6-Education/6-Education?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 1,
            'category_id' => 5,
            'title' => 'Education for girls',
            'file_path' => 'girleducation.zip',
            'tableau_link' => 'https://public.tableau.com/views/GirlsEducation_2/GirlsEducation?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 1],
            ['user_id' => 1,
            'category_id' => 1,
            'title' => 'Rural Hospital Closures',
            'file_path' => 'ruralhospital.zip',
            'tableau_link' => 'https://public.tableau.com/views/RuralHospitalClosures-ProjectHealthViz/RuralHospitalClosures?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 2,
            'category_id' => 5,
            'title' => 'Poverty and School Performance',
            'file_path' => 'povertyschool.zip',
            'tableau_link' => 'https://public.tableau.com/views/PovertyandSchoolPerformance/PovertyandSchoolPerformance?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 2,
            'category_id' => 5,
            'title' => 'Education and Foreign Languages',
            'file_path' => 'educationforeignlanguage.zip',
            'tableau_link' => 'https://public.tableau.com/views/EducationandForeignLanguages/Dashboard1?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 1],
            ['user_id' => 1,
            'category_id' => 3,
            'title' => 'Business Demography 2016',
            'file_path' => 'business_demography.zip',
            'tableau_link' => 'https://public.tableau.com/views/BusinessDemography2016/Dashboard1?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 2,
            'category_id' => 8,
            'title' => 'Air Transport Statistics 2014',
            'file_path' => 'air-transport.zip',
            'tableau_link' => 'https://public.tableau.com/views/Airtransportstats/Quarterlypassengerstatistics?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 1,
            'category_id' => 1,
            'title' => 'Community Care Programs 2015-2016',
            'file_path' => 'community_care.zip',
            'tableau_link' => 'https://public.tableau.com/views/CommunityCarePrograms/Results?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 2,
            'category_id' => 6,
            'title' => 'Effects of Climate Change on Different Crop Yields and Prices',
            'file_path' => 'climate-change-crops.zip',
            'tableau_link' => 'https://public.tableau.com/views/OECDAgricultureandClimateChange/DashboardEN?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 3],
            ['user_id' => 1,
            'category_id' => 6,
            'title' => 'Climate Change in Indonesia 2019',
            'file_path' => 'indonesia-climate-change.zip',
            'tableau_link' => 'https://public.tableau.com/views/ClimatechangeprofileIndonesia/Dashboard1?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 2,
            'category_id' => 2,
            'title' => 'Persistent Poverty and High Poverty U.S. Counties 2021',
            'file_path' => 'poverty-US-county.zip',
            'tableau_link' => 'https://public.tableau.com/views/PersistentpovertyandhighpovertyU_S_counties/PersistentandHighPovertyDashboard?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 1,
            'category_id' => 4,
            'title' => '2012 Volt Energy Usage',
            'file_path' => '2012-volt-energy.zip',
            'tableau_link' => 'https://public.tableau.com/views/VoltEnergyUsage/VoltEnergyUsage?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
            ['user_id' => 2,
            'category_id' => 2,
            'title' => 'Poverty in Indonesia 2018',
            'file_path' => 'indo-poverty-2018.zip',
            'tableau_link' => 'https://public.tableau.com/views/PovertyIndonesia/Story1?:showVizHome=no&:embed=true',
            'content' => $lorem_ip,
            'status_id' => 2],
        ];

        foreach ($data_list as $data) {
            Post::create($data);
        }
    }
}
