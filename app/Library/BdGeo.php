<?php

namespace App\Library;

class BdGeo
{
    protected $divisions = [
        ['id' => 1, 'name' => 'Barishal'],
        ['id' => 2, 'name' => 'Chattogram'],
        ['id' => 3, 'name' => 'Dhaka'],
        ['id' => 4, 'name' => 'Khulna'],
        ['id' => 5, 'name' => 'Rajshahi'],
        ['id' => 6, 'name' => 'Rangpur'],
        ['id' => 7, 'name' => 'Sylhet'],
        ['id' => 8, 'name' => 'Mymensingh'],
    ];

    protected $districts = [
        [
            'id' => 1, 'division_id' => 3, 'name' => 'Dhaka'
        ],
        [
            'id' => 2, 'division_id' => 3, 'name' => 'Faridpur'
        ],
        [
            'id' => 3, 'division_id' => 3, 'name' => 'Gazipur'
        ],
        [
            'id' => 4, 'division_id' => 3, 'name' => 'Gopalganj'
        ],
        [
            'id' => 5, 'division_id' => 8, 'name' => 'Jamalpur'
        ],
        [
            'id' => 6, 'division_id' => 3, 'name' => 'Kishoreganj'
        ],
        [
            'id' => 7, 'division_id' => 3, 'name' => 'Madaripur'
        ],
        [
            'id' => 8, 'division_id' => 3, 'name' => 'Manikganj'
        ],
        [
            'id' => 9, 'division_id' => 3, 'name' => 'Munshiganj'
        ],
        [
            'id' => 10, 'division_id' => 8, 'name' => 'Mymensingh'
        ],
        [
            'id' => 11, 'division_id' => 3, 'name' => 'Narayanganj'
        ],
        [
            'id' => 12, 'division_id' => 3, 'name' => 'Narsingdi'
        ],
        [
            'id' => 13, 'division_id' => 8, 'name' => 'Netrokona'
        ],
        [
            'id' => 14, 'division_id' => 3, 'name' => 'Rajbari'
        ],
        [
            'id' => 15, 'division_id' => 3, 'name' => 'Shariatpur'
        ],
        [
            'id' => 16, 'division_id' => 8, 'name' => 'Sherpur'
        ],
        [
            'id' => 17, 'division_id' => 3, 'name' => 'Tangail'
        ],
        [
            'id' => 18, 'division_id' => 5, 'name' => 'Bogura'
        ],
        [
            'id' => 19, 'division_id' => 5, 'name' => 'Joypurhat'
        ],
        [
            'id' => 20, 'division_id' => 5, 'name' => 'Naogaon'
        ],
        [
            'id' => 21, 'division_id' => 5, 'name' => 'Natore'
        ],
        [
            'id' => 22, 'division_id' => 5, 'name' => 'Nawabganj'
        ],
        [
            'id' => 23, 'division_id' => 5, 'name' => 'Pabna'
        ],
        [
            'id' => 24, 'division_id' => 5, 'name' => 'Rajshahi'
        ],
        [
            'id' => 25, 'division_id' => 5, 'name' => 'Sirajgonj'
        ],
        [
            'id' => 26, 'division_id' => 6, 'name' => 'Dinajpur'
        ],
        [
            'id' => 27, 'division_id' => 6, 'name' => 'Gaibandha'
        ],
        [
            'id' => 28, 'division_id' => 6, 'name' => 'Kurigram'
        ],
        [
            'id' => 29, 'division_id' => 6, 'name' => 'Lalmonirhat'
        ],
        [
            'id' => 30, 'division_id' => 6, 'name' => 'Nilphamari'
        ],
        [
            'id' => 31, 'division_id' => 6, 'name' => 'Panchagarh'
        ],
        [
            'id' => 32, 'division_id' => 6, 'name' => 'Rangpur'
        ],
        [
            'id' => 33, 'division_id' => 6, 'name' => 'Thakurgaon'
        ],
        [
            'id' => 34, 'division_id' => 1, 'name' => 'Barguna'
        ],
        [
            'id' => 35, 'division_id' => 1, 'name' => 'Barishal'
        ],
        [
            'id' => 36, 'division_id' => 1, 'name' => 'Bhola'
        ],
        [
            'id' => 37, 'division_id' => 1, 'name' => 'Jhalokati'
        ],
        [
            'id' => 38, 'division_id' => 1, 'name' => 'Patuakhali'
        ],
        [
            'id' => 39, 'division_id' => 1, 'name' => 'Pirojpur'
        ],
        [
            'id' => 40, 'division_id' => 2, 'name' => 'Bandarban'
        ],
        [
            'id' => 41, 'division_id' => 2, 'name' => 'Brahmanbaria'
        ],
        [
            'id' => 42, 'division_id' => 2, 'name' => 'Chandpur'
        ],
        [
            'id' => 43, 'division_id' => 2, 'name' => 'Chattogram'
        ],
        [
            'id' => 44, 'division_id' => 2, 'name' => 'Cumilla'
        ],
        [
            'id' => 45, 'division_id' => 2, 'name' => 'Coxs Bazar'
        ],
        [
            'id' => 46, 'division_id' => 2, 'name' => 'Feni'
        ],
        [
            'id' => 47, 'division_id' => 2, 'name' => 'Khagrachari'
        ],
        [
            'id' => 48, 'division_id' => 2, 'name' => 'Lakshmipur'
        ],
        [
            'id' => 49, 'division_id' => 2, 'name' => 'Noakhali'
        ],
        [
            'id' => 50, 'division_id' => 2, 'name' => 'Rangamati'
        ],
        [
            'id' => 51, 'division_id' => 7, 'name' => 'Habiganj'
        ],
        [
            'id' => 52, 'division_id' => 7, 'name' => 'Maulvibazar'
        ],
        [
            'id' => 53, 'division_id' => 7, 'name' => 'Sunamganj'
        ],
        [
            'id' => 54, 'division_id' => 7, 'name' => 'Sylhet'
        ],
        [
            'id' => 55, 'division_id' => 4, 'name' => 'Bagerhat'
        ],
        [
            'id' => 56, 'division_id' => 4, 'name' => 'Chuadanga'
        ],
        [
            'id' => 57, 'division_id' => 4, 'name' => 'Jashore'
        ],
        [
            'id' => 58, 'division_id' => 4, 'name' => 'Jhenaidah'
        ],
        [
            'id' => 59, 'division_id' => 4, 'name' => 'Khulna'
        ],
        [
            'id' => 60, 'division_id' => 4, 'name' => 'Kushtia'
        ],
        [
            'id' => 61, 'division_id' => 4, 'name' => 'Magura'
        ],
        [
            'id' => 62, 'division_id' => 4, 'name' => 'Meherpur'
        ],
        [
            'id' => 63, 'division_id' => 4, 'name' => 'Narail'
        ],
        [
            'id' => 64, 'division_id' => 4, 'name' => 'Satkhira'
        ],
    ];

    protected $upazilas = [
        ['id' => 1, 'district_id' => 34, 'name' => 'Amtali'],
        ['id' => 2, 'district_id' => 34, 'name' => 'Bamna'],
        ['id' => 3, 'district_id' => 34, 'name' => 'Barguna Sadar'],
        ['id' => 4, 'district_id' => 34, 'name' => 'Betagi'],
        ['id' => 5, 'district_id' => 34, 'name' => 'Patharghata'],
        ['id' => 6, 'district_id' => 34, 'name' => 'Taltali'],
        ['id' => 7, 'district_id' => 35, 'name' => 'Muladi'],
        ['id' => 8, 'district_id' => 35, 'name' => 'Babuganj'],
        ['id' => 9, 'district_id' => 35, 'name' => 'Agailjhara'],
        ['id' => 10, 'district_id' => 35, 'name' => 'Barisal Sadar'],
        ['id' => 11, 'district_id' => 35, 'name' => 'Bakerganj'],
        ['id' => 12, 'district_id' => 35, 'name' => 'Banaripara'],
        ['id' => 13, 'district_id' => 35, 'name' => 'Gaurnadi'],
        ['id' => 14, 'district_id' => 35, 'name' => 'Hizla'],
        ['id' => 15, 'district_id' => 35, 'name' => 'Mehendiganj'],
        ['id' => 16, 'district_id' => 35, 'name' => 'Wazirpur'],
        ['id' => 17, 'district_id' => 36, 'name' => 'Bhola Sadar'],
        ['id' => 18, 'district_id' => 36, 'name' => 'Burhanuddin'],
        ['id' => 19, 'district_id' => 36, 'name' => 'Char Fasson'],
        ['id' => 20, 'district_id' => 36, 'name' => 'Daulatkhan'],
        ['id' => 21, 'district_id' => 36, 'name' => 'Lalmohan'],
        ['id' => 22, 'district_id' => 36, 'name' => 'Manpura'],
        ['id' => 23, 'district_id' => 36, 'name' => 'Tazumuddin'],
        ['id' => 24, 'district_id' => 37, 'name' => 'Jhalokati Sadar'],
        ['id' => 25, 'district_id' => 37, 'name' => 'Kathalia'],
        ['id' => 26, 'district_id' => 37, 'name' => 'Nalchity'],
        ['id' => 27, 'district_id' => 37, 'name' => 'Rajapur'],
        ['id' => 28, 'district_id' => 38, 'name' => 'Bauphal'],
        ['id' => 29, 'district_id' => 38, 'name' => 'Dashmina'],
        ['id' => 30, 'district_id' => 38, 'name' => 'Galachipa'],
        ['id' => 31, 'district_id' => 38, 'name' => 'Kalapara'],
        ['id' => 32, 'district_id' => 38, 'name' => 'Mirzaganj'],
        ['id' => 33, 'district_id' => 38, 'name' => 'Patuakhali Sadar'],
        ['id' => 34, 'district_id' => 38, 'name' => 'Dumki'],
        ['id' => 35, 'district_id' => 38, 'name' => 'Rangabali'],
        ['id' => 36, 'district_id' => 39, 'name' => 'Bhandaria'],
        ['id' => 37, 'district_id' => 39, 'name' => 'Kaukhali'],
        ['id' => 38, 'district_id' => 39, 'name' => 'Mathbaria'],
        ['id' => 39, 'district_id' => 39, 'name' => 'Nazirpur'],
        ['id' => 40, 'district_id' => 39, 'name' => 'Nesarabad'],
        ['id' => 41, 'district_id' => 39, 'name' => 'Pirojpur Sadar'],
        ['id' => 42, 'district_id' => 39, 'name' => 'Zianagar'],
        ['id' => 43, 'district_id' => 40, 'name' => 'Bandarban Sadar'],
        ['id' => 44, 'district_id' => 40, 'name' => 'Thanchi'],
        ['id' => 45, 'district_id' => 40, 'name' => 'Lama'],
        ['id' => 46, 'district_id' => 40, 'name' => 'Naikhongchhari'],
        ['id' => 47, 'district_id' => 40, 'name' => 'Ali kadam'],
        ['id' => 48, 'district_id' => 40, 'name' => 'Rowangchhari'],
        ['id' => 49, 'district_id' => 40, 'name' => 'Ruma'],
        ['id' => 50, 'district_id' => 41, 'name' => 'Brahmanbaria Sadar'],
        ['id' => 51, 'district_id' => 41, 'name' => 'Ashuganj'],
        ['id' => 52, 'district_id' => 41, 'name' => 'Nasirnagar'],
        ['id' => 53, 'district_id' => 41, 'name' => 'Nabinagar'],
        ['id' => 54, 'district_id' => 41, 'name' => 'Sarail'],
        ['id' => 55, 'district_id' => 41, 'name' => 'Shahbazpur Town'],
        ['id' => 56, 'district_id' => 41, 'name' => 'Kasba'],
        ['id' => 57, 'district_id' => 41, 'name' => 'Akhaura'],
        ['id' => 58, 'district_id' => 41, 'name' => 'Bancharampur'],
        ['id' => 59, 'district_id' => 41, 'name' => 'Bijoynagar'],
        ['id' => 60, 'district_id' => 42, 'name' => 'Chandpur Sadar'],
        ['id' => 61, 'district_id' => 42, 'name' => 'Faridganj'],
        ['id' => 62, 'district_id' => 42, 'name' => 'Haimchar'],
        ['id' => 63, 'district_id' => 42, 'name' => 'Haziganj'],
        ['id' => 64, 'district_id' => 42, 'name' => 'Kachua'],
        ['id' => 65, 'district_id' => 42, 'name' => 'Matlab Uttar'],
        ['id' => 66, 'district_id' => 42, 'name' => 'Matlab Dakkhin'],
        ['id' => 67, 'district_id' => 42, 'name' => 'Shahrasti'],
        ['id' => 68, 'district_id' => 43, 'name' => 'Anwara'],
        ['id' => 69, 'district_id' => 43, 'name' => 'Banshkhali'],
        ['id' => 70, 'district_id' => 43, 'name' => 'Boalkhali'],
        ['id' => 71, 'district_id' => 43, 'name' => 'Chandanaish'],
        ['id' => 72, 'district_id' => 43, 'name' => 'Fatikchhari'],
        ['id' => 73, 'district_id' => 43, 'name' => 'Hathazari'],
        ['id' => 74, 'district_id' => 43, 'name' => 'Lohagara'],
        ['id' => 75, 'district_id' => 43, 'name' => 'Mirsharai'],
        ['id' => 76, 'district_id' => 43, 'name' => 'Patiya'],
        ['id' => 77, 'district_id' => 43, 'name' => 'Rangunia'],
        ['id' => 78, 'district_id' => 43, 'name' => 'Raozan'],
        ['id' => 79, 'district_id' => 43, 'name' => 'Sandwip'],
        ['id' => 80, 'district_id' => 43, 'name' => 'Satkania'],
        ['id' => 81, 'district_id' => 43, 'name' => 'Sitakunda'],
        ['id' => 82, 'district_id' => 44, 'name' => 'Barura'],
        ['id' => 83, 'district_id' => 44, 'name' => 'Brahmanpara'],
        ['id' => 84, 'district_id' => 44, 'name' => 'Burichong'],
        ['id' => 85, 'district_id' => 44, 'name' => 'Chandina'],
        ['id' => 86, 'district_id' => 44, 'name' => 'Chauddagram'],
        ['id' => 87, 'district_id' => 44, 'name' => 'Daudkandi'],
        ['id' => 88, 'district_id' => 44, 'name' => 'Debidwar'],
        ['id' => 89, 'district_id' => 44, 'name' => 'Homna'],
        ['id' => 90, 'district_id' => 44, 'name' => 'Comilla Sadar'],
        ['id' => 91, 'district_id' => 44, 'name' => 'Laksam'],
        ['id' => 92, 'district_id' => 44, 'name' => 'Monohorgonj'],
        ['id' => 93, 'district_id' => 44, 'name' => 'Meghna'],
        ['id' => 94, 'district_id' => 44, 'name' => 'Muradnagar'],
        ['id' => 95, 'district_id' => 44, 'name' => 'Nangalkot'],
        ['id' => 96, 'district_id' => 44, 'name' => 'Comilla Sadar South'],
        ['id' => 97, 'district_id' => 44, 'name' => 'Titas'],
        ['id' => 98, 'district_id' => 45, 'name' => 'Chakaria'],
        ['id' => 100, 'district_id' => 45, 'name' => 'Coxs Bazar Sadar'],
        ['id' => 101, 'district_id' => 45, 'name' => 'Kutubdia'],
        ['id' => 102, 'district_id' => 45, 'name' => 'Maheshkhali'],
        ['id' => 103, 'district_id' => 45, 'name' => 'Ramu'],
        ['id' => 104, 'district_id' => 45, 'name' => 'Teknaf'],
        ['id' => 105, 'district_id' => 45, 'name' => 'Ukhia'],
        ['id' => 106, 'district_id' => 45, 'name' => 'Pekua'],
        ['id' => 107, 'district_id' => 46, 'name' => 'Feni Sadar'],
        ['id' => 108, 'district_id' => 46, 'name' => 'Chagalnaiya'],
        ['id' => 109, 'district_id' => 46, 'name' => 'Daganbhyan'],
        ['id' => 110, 'district_id' => 46, 'name' => 'Parshuram'],
        ['id' => 111, 'district_id' => 46, 'name' => 'Fhulgazi'],
        ['id' => 112, 'district_id' => 46, 'name' => 'Sonagazi'],
        ['id' => 113, 'district_id' => 47, 'name' => 'Dighinala'],
        ['id' => 114, 'district_id' => 47, 'name' => 'Khagrachhari'],
        ['id' => 115, 'district_id' => 47, 'name' => 'Lakshmichhari'],
        ['id' => 116, 'district_id' => 47, 'name' => 'Mahalchhari'],
        ['id' => 117, 'district_id' => 47, 'name' => 'Manikchhari'],
        ['id' => 118, 'district_id' => 47, 'name' => 'Matiranga'],
        ['id' => 119, 'district_id' => 47, 'name' => 'Panchhari'],
        ['id' => 120, 'district_id' => 47, 'name' => 'Ramgarh'],
        ['id' => 121, 'district_id' => 48, 'name' => 'Lakshmipur Sadar'],
        ['id' => 122, 'district_id' => 48, 'name' => 'Raipur'],
        ['id' => 123, 'district_id' => 48, 'name' => 'Ramganj'],
        ['id' => 124, 'district_id' => 48, 'name' => 'Ramgati'],
        ['id' => 125, 'district_id' => 48, 'name' => 'Komol Nagar'],
        ['id' => 126, 'district_id' => 49, 'name' => 'Noakhali Sadar'],
        ['id' => 127, 'district_id' => 49, 'name' => 'Begumganj'],
        ['id' => 128, 'district_id' => 49, 'name' => 'Chatkhil'],
        ['id' => 129, 'district_id' => 49, 'name' => 'Companyganj'],
        ['id' => 130, 'district_id' => 49, 'name' => 'Shenbag'],
        ['id' => 131, 'district_id' => 49, 'name' => 'Hatia'],
        ['id' => 132, 'district_id' => 49, 'name' => 'Kobirhat'],
        ['id' => 133, 'district_id' => 49, 'name' => 'Sonaimuri'],
        ['id' => 134, 'district_id' => 49, 'name' => 'Suborno Char'],
        ['id' => 135, 'district_id' => 50, 'name' => 'Rangamati Sadar'],
        ['id' => 136, 'district_id' => 50, 'name' => 'Belaichhari'],
        ['id' => 137, 'district_id' => 50, 'name' => 'Bagaichhari'],
        ['id' => 138, 'district_id' => 50, 'name' => 'Barkal'],
        ['id' => 139, 'district_id' => 50, 'name' => 'Juraichhari'],
        ['id' => 140, 'district_id' => 50, 'name' => 'Rajasthali'],
        ['id' => 141, 'district_id' => 50, 'name' => 'Kaptai'],
        ['id' => 142, 'district_id' => 50, 'name' => 'Langadu'],
        ['id' => 143, 'district_id' => 50, 'name' => 'Nannerchar'],
        ['id' => 144, 'district_id' => 50, 'name' => 'Kaukhali'],
        ['id' => 145, 'district_id' => 1, 'name' => 'Dhamrai'],
        ['id' => 146, 'district_id' => 1, 'name' => 'Dohar'],
        ['id' => 147, 'district_id' => 1, 'name' => 'Keraniganj'],
        ['id' => 148, 'district_id' => 1, 'name' => 'Nawabganj'],
        ['id' => 149, 'district_id' => 1, 'name' => 'Savar'],
        ['id' => 150, 'district_id' => 2, 'name' => 'Faridpur Sadar'],
        ['id' => 151, 'district_id' => 2, 'name' => 'Boalmari'],
        ['id' => 152, 'district_id' => 2, 'name' => 'Alfadanga'],
        ['id' => 153, 'district_id' => 2, 'name' => 'Madhukhali'],
        ['id' => 154, 'district_id' => 2, 'name' => 'Bhanga'],
        ['id' => 155, 'district_id' => 2, 'name' => 'Nagarkanda'],
        ['id' => 156, 'district_id' => 2, 'name' => 'Charbhadrasan'],
        ['id' => 157, 'district_id' => 2, 'name' => 'Sadarpur'],
        ['id' => 158, 'district_id' => 2, 'name' => 'Shaltha'],
        ['id' => 159, 'district_id' => 3, 'name' => 'Gazipur Sadar-Joydebpur'],
        ['id' => 160, 'district_id' => 3, 'name' => 'Kaliakior'],
        ['id' => 161, 'district_id' => 3, 'name' => 'Kapasia'],
        ['id' => 162, 'district_id' => 3, 'name' => 'Sripur'],
        ['id' => 163, 'district_id' => 3, 'name' => 'Kaliganj'],
        ['id' => 164, 'district_id' => 3, 'name' => 'Tongi'],
        ['id' => 165, 'district_id' => 4, 'name' => 'Gopalganj Sadar'],
        ['id' => 166, 'district_id' => 4, 'name' => 'Kashiani'],
        ['id' => 167, 'district_id' => 4, 'name' => 'Kotalipara'],
        ['id' => 168, 'district_id' => 4, 'name' => 'Muksudpur'],
        ['id' => 169, 'district_id' => 4, 'name' => 'Tungipara'],
        ['id' => 170, 'district_id' => 5, 'name' => 'Dewanganj'],
        ['id' => 171, 'district_id' => 5, 'name' => 'Baksiganj'],
        ['id' => 172, 'district_id' => 5, 'name' => 'Islampur'],
        ['id' => 173, 'district_id' => 5, 'name' => 'Jamalpur Sadar'],
        ['id' => 174, 'district_id' => 5, 'name' => 'Madarganj'],
        ['id' => 175, 'district_id' => 5, 'name' => 'Melandaha'],
        ['id' => 176, 'district_id' => 5, 'name' => 'Sarishabari'],
        ['id' => 177, 'district_id' => 5, 'name' => 'Narundi Police I.C'],
        ['id' => 178, 'district_id' => 6, 'name' => 'Astagram'],
        ['id' => 179, 'district_id' => 6, 'name' => 'Bajitpur'],
        ['id' => 180, 'district_id' => 6, 'name' => 'Bhairab'],
        ['id' => 181, 'district_id' => 6, 'name' => 'Hossainpur'],
        ['id' => 182, 'district_id' => 6, 'name' => 'Itna'],
        ['id' => 183, 'district_id' => 6, 'name' => 'Karimganj'],
        ['id' => 184, 'district_id' => 6, 'name' => 'Katiadi'],
        ['id' => 185, 'district_id' => 6, 'name' => 'Kishoreganj Sadar'],
        ['id' => 186, 'district_id' => 6, 'name' => 'Kuliarchar'],
        ['id' => 187, 'district_id' => 6, 'name' => 'Mithamain'],
        ['id' => 188, 'district_id' => 6, 'name' => 'Nikli'],
        ['id' => 189, 'district_id' => 6, 'name' => 'Pakundia'],
        ['id' => 190, 'district_id' => 6, 'name' => 'Tarail'],
        ['id' => 191, 'district_id' => 7, 'name' => 'Madaripur Sadar'],
        ['id' => 192, 'district_id' => 7, 'name' => 'Kalkini'],
        ['id' => 193, 'district_id' => 7, 'name' => 'Rajoir'],
        ['id' => 194, 'district_id' => 7, 'name' => 'Shibchar'],
        ['id' => 195, 'district_id' => 8, 'name' => 'Manikganj Sadar'],
        ['id' => 196, 'district_id' => 8, 'name' => 'Singair'],
        ['id' => 197, 'district_id' => 8, 'name' => 'Shibalaya'],
        ['id' => 198, 'district_id' => 8, 'name' => 'Saturia'],
        ['id' => 199, 'district_id' => 8, 'name' => 'Harirampur'],
        ['id' => 200, 'district_id' => 8, 'name' => 'Ghior'],
        ['id' => 201, 'district_id' => 8, 'name' => 'Daulatpur'],
        ['id' => 202, 'district_id' => 9, 'name' => 'Lohajang'],
        ['id' => 203, 'district_id' => 9, 'name' => 'Sreenagar'],
        ['id' => 204, 'district_id' => 9, 'name' => 'Munshiganj Sadar'],
        ['id' => 205, 'district_id' => 9, 'name' => 'Sirajdikhan'],
        ['id' => 206, 'district_id' => 9, 'name' => 'Tongibari'],
        ['id' => 207, 'district_id' => 9, 'name' => 'Gazaria'],
        ['id' => 208, 'district_id' => 10, 'name' => 'Bhaluka'],
        ['id' => 209, 'district_id' => 10, 'name' => 'Trishal'],
        ['id' => 210, 'district_id' => 10, 'name' => 'Haluaghat'],
        ['id' => 211, 'district_id' => 10, 'name' => 'Muktagachha'],
        ['id' => 212, 'district_id' => 10, 'name' => 'Dhobaura'],
        ['id' => 213, 'district_id' => 10, 'name' => 'Fulbaria'],
        ['id' => 214, 'district_id' => 10, 'name' => 'Gaffargaon'],
        ['id' => 215, 'district_id' => 10, 'name' => 'Gauripur'],
        ['id' => 216, 'district_id' => 10, 'name' => 'Ishwarganj'],
        ['id' => 217, 'district_id' => 10, 'name' => 'Mymensingh Sadar'],
        ['id' => 218, 'district_id' => 10, 'name' => 'Nandail'],
        ['id' => 219, 'district_id' => 10, 'name' => 'Phulpur'],
        ['id' => 220, 'district_id' => 11, 'name' => 'Araihazar'],
        ['id' => 221, 'district_id' => 11, 'name' => 'Sonargaon'],
        ['id' => 222, 'district_id' => 11, 'name' => 'Bandar'],
        ['id' => 223, 'district_id' => 11, 'name' => 'Naryanganj Sadar'],
        ['id' => 224, 'district_id' => 11, 'name' => 'Rupganj'],
        ['id' => 225, 'district_id' => 11, 'name' => 'Siddirgonj'],
        ['id' => 226, 'district_id' => 12, 'name' => 'Belabo'],
        ['id' => 227, 'district_id' => 12, 'name' => 'Monohardi'],
        ['id' => 228, 'district_id' => 12, 'name' => 'Narsingdi Sadar'],
        ['id' => 229, 'district_id' => 12, 'name' => 'Palash'],
        ['id' => 230, 'district_id' => 12, 'name' => 'Raipura, Narsingdi'],
        ['id' => 231, 'district_id' => 12, 'name' => 'Shibpur'],
        ['id' => 232, 'district_id' => 13, 'name' => 'Kendua Upazilla'],
        ['id' => 233, 'district_id' => 13, 'name' => 'Atpara Upazilla'],
        ['id' => 234, 'district_id' => 13, 'name' => 'Barhatta Upazilla'],
        ['id' => 235, 'district_id' => 13, 'name' => 'Durgapur Upazilla'],
        ['id' => 236, 'district_id' => 13, 'name' => 'Kalmakanda Upazilla'],
        ['id' => 237, 'district_id' => 13, 'name' => 'Madan Upazilla'],
        ['id' => 238, 'district_id' => 13, 'name' => 'Mohanganj Upazilla'],
        ['id' => 239, 'district_id' => 13, 'name' => 'Netrakona-S Upazilla'],
        ['id' => 240, 'district_id' => 13, 'name' => 'Purbadhala Upazilla'],
        ['id' => 241, 'district_id' => 13, 'name' => 'Khaliajuri Upazilla'],
        ['id' => 242, 'district_id' => 14, 'name' => 'Baliakandi'],
        ['id' => 243, 'district_id' => 14, 'name' => 'Goalandaghat'],
        ['id' => 244, 'district_id' => 14, 'name' => 'Pangsha'],
        ['id' => 245, 'district_id' => 14, 'name' => 'Kalukhali'],
        ['id' => 246, 'district_id' => 14, 'name' => 'Rajbari Sadar'],
        ['id' => 247, 'district_id' => 15, 'name' => 'Shariatpur Sadar -Palong'],
        ['id' => 248, 'district_id' => 15, 'name' => 'Damudya'],
        ['id' => 249, 'district_id' => 15, 'name' => 'Naria'],
        ['id' => 250, 'district_id' => 15, 'name' => 'Jajira'],
        ['id' => 251, 'district_id' => 15, 'name' => 'Bhedarganj'],
        ['id' => 252, 'district_id' => 15, 'name' => 'Gosairhat'],
        ['id' => 253, 'district_id' => 16, 'name' => 'Jhenaigati'],
        ['id' => 254, 'district_id' => 16, 'name' => 'Nakla'],
        ['id' => 255, 'district_id' => 16, 'name' => 'Nalitabari'],
        ['id' => 256, 'district_id' => 16, 'name' => 'Sherpur Sadar'],
        ['id' => 257, 'district_id' => 16, 'name' => 'Sreebardi'],
        ['id' => 258, 'district_id' => 17, 'name' => 'Tangail Sadar'],
        ['id' => 259, 'district_id' => 17, 'name' => 'Sakhipur'],
        ['id' => 260, 'district_id' => 17, 'name' => 'Basail'],
        ['id' => 261, 'district_id' => 17, 'name' => 'Madhupur'],
        ['id' => 262, 'district_id' => 17, 'name' => 'Ghatail'],
        ['id' => 263, 'district_id' => 17, 'name' => 'Kalihati'],
        ['id' => 264, 'district_id' => 17, 'name' => 'Nagarpur'],
        ['id' => 265, 'district_id' => 17, 'name' => 'Mirzapur'],
        ['id' => 266, 'district_id' => 17, 'name' => 'Gopalpur'],
        ['id' => 267, 'district_id' => 17, 'name' => 'Delduar'],
        ['id' => 268, 'district_id' => 17, 'name' => 'Bhuapur'],
        ['id' => 269, 'district_id' => 17, 'name' => 'Dhanbari'],
        ['id' => 270, 'district_id' => 55, 'name' => 'Bagerhat Sadar'],
        ['id' => 271, 'district_id' => 55, 'name' => 'Chitalmari'],
        ['id' => 272, 'district_id' => 55, 'name' => 'Fakirhat'],
        ['id' => 273, 'district_id' => 55, 'name' => 'Kachua'],
        ['id' => 274, 'district_id' => 55, 'name' => 'Mollahat'],
        ['id' => 275, 'district_id' => 55, 'name' => 'Mongla'],
        ['id' => 276, 'district_id' => 55, 'name' => 'Morrelganj'],
        ['id' => 277, 'district_id' => 55, 'name' => 'Rampal'],
        ['id' => 278, 'district_id' => 55, 'name' => 'Sarankhola'],
        ['id' => 279, 'district_id' => 56, 'name' => 'Damurhuda'],
        ['id' => 280, 'district_id' => 56, 'name' => 'Chuadanga-S'],
        ['id' => 281, 'district_id' => 56, 'name' => 'Jibannagar'],
        ['id' => 282, 'district_id' => 56, 'name' => 'Alamdanga'],
        ['id' => 283, 'district_id' => 57, 'name' => 'Abhaynagar'],
        ['id' => 284, 'district_id' => 57, 'name' => 'Keshabpur'],
        ['id' => 285, 'district_id' => 57, 'name' => 'Bagherpara'],
        ['id' => 286, 'district_id' => 57, 'name' => 'Jessore Sadar'],
        ['id' => 287, 'district_id' => 57, 'name' => 'Chaugachha'],
        ['id' => 288, 'district_id' => 57, 'name' => 'Manirampur'],
        ['id' => 289, 'district_id' => 57, 'name' => 'Jhikargachha'],
        ['id' => 290, 'district_id' => 57, 'name' => 'Sharsha'],
        ['id' => 291, 'district_id' => 58, 'name' => 'Jhenaidah Sadar'],
        ['id' => 292, 'district_id' => 58, 'name' => 'Maheshpur'],
        ['id' => 293, 'district_id' => 58, 'name' => 'Kaliganj'],
        ['id' => 294, 'district_id' => 58, 'name' => 'Kotchandpur'],
        ['id' => 295, 'district_id' => 58, 'name' => 'Shailkupa'],
        ['id' => 296, 'district_id' => 58, 'name' => 'Harinakunda'],
        ['id' => 297, 'district_id' => 59, 'name' => 'Terokhada'],
        ['id' => 298, 'district_id' => 59, 'name' => 'Batiaghata'],
        ['id' => 299, 'district_id' => 59, 'name' => 'Dacope'],
        ['id' => 300, 'district_id' => 59, 'name' => 'Dumuria'],
        ['id' => 301, 'district_id' => 59, 'name' => 'Dighalia'],
        ['id' => 302, 'district_id' => 59, 'name' => 'Koyra'],
        ['id' => 303, 'district_id' => 59, 'name' => 'Paikgachha'],
        ['id' => 304, 'district_id' => 59, 'name' => 'Phultala'],
        ['id' => 305, 'district_id' => 59, 'name' => 'Rupsa'],
        ['id' => 306, 'district_id' => 60, 'name' => 'Kushtia Sadar'],
        ['id' => 307, 'district_id' => 60, 'name' => 'Kumarkhali'],
        ['id' => 308, 'district_id' => 60, 'name' => 'Daulatpur'],
        ['id' => 309, 'district_id' => 60, 'name' => 'Mirpur'],
        ['id' => 310, 'district_id' => 60, 'name' => 'Bheramara'],
        ['id' => 311, 'district_id' => 60, 'name' => 'Khoksa'],
        ['id' => 312, 'district_id' => 61, 'name' => 'Magura Sadar'],
        ['id' => 313, 'district_id' => 61, 'name' => 'Mohammadpur'],
        ['id' => 314, 'district_id' => 61, 'name' => 'Shalikha'],
        ['id' => 315, 'district_id' => 61, 'name' => 'Sreepur'],
        ['id' => 316, 'district_id' => 62, 'name' => 'angni'],
        ['id' => 317, 'district_id' => 62, 'name' => 'Mujib Nagar'],
        ['id' => 318, 'district_id' => 62, 'name' => 'Meherpur-S'],
        ['id' => 319, 'district_id' => 63, 'name' => 'Narail-S Upazilla'],
        ['id' => 320, 'district_id' => 63, 'name' => 'Lohagara Upazilla'],
        ['id' => 321, 'district_id' => 63, 'name' => 'Kalia Upazilla'],
        ['id' => 322, 'district_id' => 64, 'name' => 'Satkhira Sadar'],
        ['id' => 323, 'district_id' => 64, 'name' => 'Assasuni'],
        ['id' => 324, 'district_id' => 64, 'name' => 'Debhata'],
        ['id' => 325, 'district_id' => 64, 'name' => 'Tala'],
        ['id' => 326, 'district_id' => 64, 'name' => 'Kalaroa'],
        ['id' => 327, 'district_id' => 64, 'name' => 'Kaliganj'],
        ['id' => 328, 'district_id' => 64, 'name' => 'Shyamnagar'],
        ['id' => 329, 'district_id' => 18, 'name' => 'Adamdighi'],
        ['id' => 330, 'district_id' => 18, 'name' => 'Bogra Sadar'],
        ['id' => 331, 'district_id' => 18, 'name' => 'Sherpur'],
        ['id' => 332, 'district_id' => 18, 'name' => 'Dhunat'],
        ['id' => 333, 'district_id' => 18, 'name' => 'Dhupchanchia'],
        ['id' => 334, 'district_id' => 18, 'name' => 'Gabtali'],
        ['id' => 335, 'district_id' => 18, 'name' => 'Kahaloo'],
        ['id' => 336, 'district_id' => 18, 'name' => 'Nandigram'],
        ['id' => 337, 'district_id' => 18, 'name' => 'Sahajanpur'],
        ['id' => 338, 'district_id' => 18, 'name' => 'Sariakandi'],
        ['id' => 339, 'district_id' => 18, 'name' => 'Shibganj'],
        ['id' => 340, 'district_id' => 18, 'name' => 'Sonatala'],
        ['id' => 341, 'district_id' => 19, 'name' => 'Joypurhat S'],
        ['id' => 342, 'district_id' => 19, 'name' => 'Akkelpur'],
        ['id' => 343, 'district_id' => 19, 'name' => 'Kalai'],
        ['id' => 344, 'district_id' => 19, 'name' => 'Khetlal'],
        ['id' => 345, 'district_id' => 19, 'name' => 'Panchbibi'],
        ['id' => 346, 'district_id' => 20, 'name' => 'Naogaon Sadar'],
        ['id' => 347, 'district_id' => 20, 'name' => 'Mohadevpur'],
        ['id' => 348, 'district_id' => 20, 'name' => 'Manda'],
        ['id' => 349, 'district_id' => 20, 'name' => 'Niamatpur'],
        ['id' => 350, 'district_id' => 20, 'name' => 'Atrai'],
        ['id' => 351, 'district_id' => 20, 'name' => 'Raninagar'],
        ['id' => 352, 'district_id' => 20, 'name' => 'Patnitala'],
        ['id' => 353, 'district_id' => 20, 'name' => 'Dhamoirhat'],
        ['id' => 354, 'district_id' => 20, 'name' => 'Sapahar'],
        ['id' => 355, 'district_id' => 20, 'name' => 'Porsha'],
        ['id' => 356, 'district_id' => 20, 'name' => 'Badalgachhi'],
        ['id' => 357, 'district_id' => 21, 'name' => 'Natore Sadar'],
        ['id' => 358, 'district_id' => 21, 'name' => 'Baraigram'],
        ['id' => 359, 'district_id' => 21, 'name' => 'Bagatipara'],
        ['id' => 360, 'district_id' => 21, 'name' => 'Lalpur'],
        ['id' => 361, 'district_id' => 21, 'name' => 'Natore Sadar'],
        ['id' => 362, 'district_id' => 21, 'name' => 'Baraigram'],
        ['id' => 363, 'district_id' => 22, 'name' => 'Bholahat'],
        ['id' => 364, 'district_id' => 22, 'name' => 'Gomastapur'],
        ['id' => 365, 'district_id' => 22, 'name' => 'Nachole'],
        ['id' => 366, 'district_id' => 22, 'name' => 'Nawabganj Sadar'],
        ['id' => 367, 'district_id' => 22, 'name' => 'Shibganj'],
        ['id' => 368, 'district_id' => 23, 'name' => 'Atgharia'],
        ['id' => 369, 'district_id' => 23, 'name' => 'Bera'],
        ['id' => 370, 'district_id' => 23, 'name' => 'Bhangura'],
        ['id' => 371, 'district_id' => 23, 'name' => 'Chatmohar'],
        ['id' => 372, 'district_id' => 23, 'name' => 'Faridpur'],
        ['id' => 373, 'district_id' => 23, 'name' => 'Ishwardi'],
        ['id' => 374, 'district_id' => 23, 'name' => 'Pabna Sadar'],
        ['id' => 375, 'district_id' => 23, 'name' => 'Santhia'],
        ['id' => 376, 'district_id' => 23, 'name' => 'Sujanagar'],
        ['id' => 377, 'district_id' => 24, 'name' => 'Bagha'],
        ['id' => 378, 'district_id' => 24, 'name' => 'Bagmara'],
        ['id' => 379, 'district_id' => 24, 'name' => 'Charghat'],
        ['id' => 380, 'district_id' => 24, 'name' => 'Durgapur'],
        ['id' => 381, 'district_id' => 24, 'name' => 'Godagari'],
        ['id' => 382, 'district_id' => 24, 'name' => 'Mohanpur'],
        ['id' => 383, 'district_id' => 24, 'name' => 'Paba'],
        ['id' => 384, 'district_id' => 24, 'name' => 'Puthia'],
        ['id' => 385, 'district_id' => 24, 'name' => 'Tanore'],
        ['id' => 386, 'district_id' => 25, 'name' => 'Sirajganj Sadar'],
        ['id' => 387, 'district_id' => 25, 'name' => 'Belkuchi'],
        ['id' => 388, 'district_id' => 25, 'name' => 'Chauhali'],
        ['id' => 389, 'district_id' => 25, 'name' => 'Kamarkhanda'],
        ['id' => 390, 'district_id' => 25, 'name' => 'Kazipur'],
        ['id' => 391, 'district_id' => 25, 'name' => 'Raiganj'],
        ['id' => 392, 'district_id' => 25, 'name' => 'Shahjadpur'],
        ['id' => 393, 'district_id' => 25, 'name' => 'Tarash'],
        ['id' => 394, 'district_id' => 25, 'name' => 'Ullahpara'],
        ['id' => 395, 'district_id' => 26, 'name' => 'Birampur'],
        ['id' => 396, 'district_id' => 26, 'name' => 'Birganj'],
        ['id' => 397, 'district_id' => 26, 'name' => 'Biral'],
        ['id' => 398, 'district_id' => 26, 'name' => 'Bochaganj'],
        ['id' => 399, 'district_id' => 26, 'name' => 'Chirirbandar'],
        ['id' => 400, 'district_id' => 26, 'name' => 'Phulbari'],
        ['id' => 401, 'district_id' => 26, 'name' => 'Ghoraghat'],
        ['id' => 402, 'district_id' => 26, 'name' => 'Hakimpur'],
        ['id' => 403, 'district_id' => 26, 'name' => 'Kaharole'],
        ['id' => 404, 'district_id' => 26, 'name' => 'Khansama'],
        ['id' => 405, 'district_id' => 26, 'name' => 'Dinajpur Sadar'],
        ['id' => 406, 'district_id' => 26, 'name' => 'Nawabganj'],
        ['id' => 407, 'district_id' => 26, 'name' => 'Parbatipur'],
        ['id' => 408, 'district_id' => 27, 'name' => 'Fulchhari'],
        ['id' => 409, 'district_id' => 27, 'name' => 'Gaibandha sadar'],
        ['id' => 410, 'district_id' => 27, 'name' => 'Gobindaganj'],
        ['id' => 411, 'district_id' => 27, 'name' => 'Palashbari'],
        ['id' => 412, 'district_id' => 27, 'name' => 'Sadullapur'],
        ['id' => 413, 'district_id' => 27, 'name' => 'Saghata'],
        ['id' => 414, 'district_id' => 27, 'name' => 'Sundarganj'],
        ['id' => 415, 'district_id' => 28, 'name' => 'Kurigram Sadar'],
        ['id' => 416, 'district_id' => 28, 'name' => 'Nageshwari'],
        ['id' => 417, 'district_id' => 28, 'name' => 'Bhurungamari'],
        ['id' => 418, 'district_id' => 28, 'name' => 'Phulbari'],
        ['id' => 419, 'district_id' => 28, 'name' => 'Rajarhat'],
        ['id' => 420, 'district_id' => 28, 'name' => 'Ulipur'],
        ['id' => 421, 'district_id' => 28, 'name' => 'Chilmari'],
        ['id' => 422, 'district_id' => 28, 'name' => 'Rowmari'],
        ['id' => 423, 'district_id' => 28, 'name' => 'Char Rajibpur'],
        ['id' => 424, 'district_id' => 29, 'name' => 'Lalmanirhat Sadar'],
        ['id' => 425, 'district_id' => 29, 'name' => 'Aditmari'],
        ['id' => 426, 'district_id' => 29, 'name' => 'Kaliganj'],
        ['id' => 427, 'district_id' => 29, 'name' => 'Hatibandha'],
        ['id' => 428, 'district_id' => 29, 'name' => 'Patgram'],
        ['id' => 429, 'district_id' => 30, 'name' => 'Nilphamari Sadar'],
        ['id' => 430, 'district_id' => 30, 'name' => 'Saidpur'],
        ['id' => 431, 'district_id' => 30, 'name' => 'Jaldhaka'],
        ['id' => 432, 'district_id' => 30, 'name' => 'Kishoreganj'],
        ['id' => 433, 'district_id' => 30, 'name' => 'Domar'],
        ['id' => 434, 'district_id' => 30, 'name' => 'Dimla'],
        ['id' => 435, 'district_id' => 31, 'name' => 'Panchagarh Sadar'],
        ['id' => 436, 'district_id' => 31, 'name' => 'Debiganj'],
        ['id' => 437, 'district_id' => 31, 'name' => 'Boda'],
        ['id' => 438, 'district_id' => 31, 'name' => 'Atwari'],
        ['id' => 439, 'district_id' => 31, 'name' => 'Tetulia'],
        ['id' => 440, 'district_id' => 32, 'name' => 'Badarganj'],
        ['id' => 441, 'district_id' => 32, 'name' => 'Mithapukur'],
        ['id' => 442, 'district_id' => 32, 'name' => 'Gangachara'],
        ['id' => 443, 'district_id' => 32, 'name' => 'Kaunia'],
        ['id' => 444, 'district_id' => 32, 'name' => 'Rangpur Sadar'],
        ['id' => 445, 'district_id' => 32, 'name' => 'Pirgachha'],
        ['id' => 446, 'district_id' => 32, 'name' => 'Pirganj'],
        ['id' => 447, 'district_id' => 32, 'name' => 'Taraganj'],
        ['id' => 448, 'district_id' => 33, 'name' => 'Thakurgaon Sadar'],
        ['id' => 449, 'district_id' => 33, 'name' => 'Pirganj'],
        ['id' => 450, 'district_id' => 33, 'name' => 'Baliadangi'],
        ['id' => 451, 'district_id' => 33, 'name' => 'Haripur'],
        ['id' => 452, 'district_id' => 33, 'name' => 'Ranisankail'],
        ['id' => 453, 'district_id' => 51, 'name' => 'Ajmiriganj'],
        ['id' => 454, 'district_id' => 51, 'name' => 'Baniachang'],
        ['id' => 455, 'district_id' => 51, 'name' => 'Bahubal'],
        ['id' => 456, 'district_id' => 51, 'name' => 'Chunarughat'],
        ['id' => 457, 'district_id' => 51, 'name' => 'Habiganj Sadar'],
        ['id' => 458, 'district_id' => 51, 'name' => 'Lakhai'],
        ['id' => 459, 'district_id' => 51, 'name' => 'Madhabpur'],
        ['id' => 460, 'district_id' => 51, 'name' => 'Nabiganj'],
        ['id' => 461, 'district_id' => 51, 'name' => 'Shaistagonj'],
        ['id' => 462, 'district_id' => 52, 'name' => 'Moulvibazar Sadar'],
        ['id' => 463, 'district_id' => 52, 'name' => 'Barlekha'],
        ['id' => 464, 'district_id' => 52, 'name' => 'Juri'],
        ['id' => 465, 'district_id' => 52, 'name' => 'Kamalganj'],
        ['id' => 466, 'district_id' => 52, 'name' => 'Kulaura'],
        ['id' => 467, 'district_id' => 52, 'name' => 'Rajnagar'],
        ['id' => 468, 'district_id' => 52, 'name' => 'Sreemangal'],
        ['id' => 469, 'district_id' => 53, 'name' => 'Bishwamvarpur'],
        ['id' => 470, 'district_id' => 53, 'name' => 'Chhatak'],
        ['id' => 471, 'district_id' => 53, 'name' => 'Derai'],
        ['id' => 472, 'district_id' => 53, 'name' => 'Dharampasha'],
        ['id' => 473, 'district_id' => 53, 'name' => 'Dowarabazar'],
        ['id' => 474, 'district_id' => 53, 'name' => 'Jagannathpur'],
        ['id' => 475, 'district_id' => 53, 'name' => 'Jamalganj'],
        ['id' => 476, 'district_id' => 53, 'name' => 'Sulla'],
        ['id' => 477, 'district_id' => 53, 'name' => 'Sunamganj Sadar'],
        ['id' => 478, 'district_id' => 53, 'name' => 'Shanthiganj'],
        ['id' => 479, 'district_id' => 53, 'name' => 'Tahirpur'],
        ['id' => 480, 'district_id' => 54, 'name' => 'Sylhet Sadar'],
        ['id' => 481, 'district_id' => 54, 'name' => 'Beanibazar'],
        ['id' => 482, 'district_id' => 54, 'name' => 'Bishwanath'],
        ['id' => 483, 'district_id' => 54, 'name' => 'Dakshin Surma'],
        ['id' => 484, 'district_id' => 54, 'name' => 'Balaganj'],
        ['id' => 485, 'district_id' => 54, 'name' => 'Companiganj'],
        ['id' => 486, 'district_id' => 54, 'name' => 'Fenchuganj'],
        ['id' => 487, 'district_id' => 54, 'name' => 'Golapganj'],
        ['id' => 488, 'district_id' => 54, 'name' => 'Gowainghat'],
        ['id' => 489, 'district_id' => 54, 'name' => 'Jaintiapur'],
        ['id' => 490, 'district_id' => 54, 'name' => 'Kanaighat'],
        ['id' => 491, 'district_id' => 54, 'name' => 'Zakiganj'],
        ['id' => 492, 'district_id' => 54, 'name' => 'Nobigonj'],
        ['id' => 493, 'district_id' => 45, 'name' => 'Eidgaon'],
        ['id' => 494, 'district_id' => 53, 'name' => 'Modhyanagar'],
        ['id' => 495, 'district_id' => 7, 'name' => 'Dasar'],
    ];

    public static function getDivisions()
    {
        return collect(with(new static)->divisions);
    }

    public static function getDistricts($division_id = [])
    {
        return count($division_id) ?
               collect(with(new static)->districts)->whereIn('division_id', $division_id) :
               collect(with(new static)->districts);
    }

    public static function getUpazilas($district_id = [])
    {
        return count($district_id) ?
               collect(with(new static)->upazilas)->whereIn('district_id', $district_id) :
               collect(with(new static)->upazilas);
    }
}
