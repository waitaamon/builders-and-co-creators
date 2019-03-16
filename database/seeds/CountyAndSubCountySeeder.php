<?php

use Illuminate\Database\Seeder;

class CountyAndSubCountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_data = '[
    {
        "name": "Baringo",
        "capital": "Kabarnet",
        "code": 30,
        "sub_counties": [
        "Baringo central",
        "Baringo north",
        "Baringo south",
        "Eldama ravine",
        "Mogotio",
        "Tiaty"
    ]
    },
    {
        "name": "Bomet",
        "capital": "Bomet",
        "code": 36,
        "sub_counties": [
        "Bomet central",
        "Bomet east",
        "Chepalungu",
        "Konoin",
        "Sotik"
    ]
    },
    {
        "name": "Bungoma",
        "capital": "Bungoma",
        "code": 39,
        "sub_counties": [
        "Bumula",
        "Kabuchai",
        "Kanduyi",
        "Kimilil",
        "Mt Elgon",
        "Sirisia",
        "Tongaren",
        "Webuye east",
        "Webuye west"
    ]
    },
    {
        "name": "Busia",
        "capital": "Busia",
        "code": 40,
        "sub_counties": [
        "Budalangi",
        "Butula",
        "Funyula",
        "Nambele",
        "Teso North",
        "Teso South"
    ]
    },
    {
        "name": "Elgeyo-Marakwet",
        "capital": "Iten",
        "code": 28,
        "sub_counties": [
        "Keiyo north",
        "Keiyo south",
        "Marakwet east",
        "Marakwet west"
    ]
    },
    {
        "name": "Embu",
        "capital": "Embu",
        "code": 14,
        "sub_counties": [
        "Manyatta",
        "Mbeere north",
        "Mbeere south",
        "Runyenjes"
    ]
    },
    {
        "name": "Garissa",
        "capital": "Garissa",
        "code": 7,
        "sub_counties": [
        "Daadab",
        "Fafi",
        "Garissa",
        "Hulugho",
        "Ijara",
        "Lagdera balambala"
    ]
    },
    {
        "name": "Homa Bay",
        "capital": "Homa Bay",
        "code": 43,
        "sub_counties": [
        "Homabay town",
        "Kabondo",
        "Karachwonyo",
        "Kasipul",
        "Mbita",
        "Ndhiwa",
        "Rangwe",
        "Suba"
    ]
    },
    {
        "name": "Isiolo",
        "capital": "Isiolo",
        "code": 11,
        "sub_counties": [
        "Central",
        "Garba tula",
        "Kina",
        "Merit",
        "Oldonyiro",
        "Sericho"
    ]
    },
    {
        "name": "Kajiado",
        "capital": "kajiado",
        "code": 34,
        "sub_counties": [
        "Isinya.",
        "Kajiado Central.",
        "Kajiado North.",
        "Loitokitok.",
        "Mashuuru."
    ]
    },
    {
        "name": "Kakamega",
        "capital": "Kakamega",
        "code": 37,
        "sub_counties": [
        "Butere",
        "Kakamega central",
        "Kakamega east",
        "Kakamega north",
        "Kakamega south",
        "Khwisero",
        "Lugari",
        "Lukuyani",
        "Lurambi",
        "Matete",
        "Mumias",
        "Mutungu",
        "Navakholo"
    ]
    },
    {
        "name": "Kericho",
        "capital": "Kericho",
        "code": 35,
        "sub_counties": [
        "Ainamoi",
        "Belgut",
        "Bureti",
        "Kipkelion east",
        "Kipkelion west",
        "Soin sigowet"
    ]
    },
    {
        "name": "Kiambu",
        "capital": "Kiambu",
        "code": 22,
        "sub_counties": [
        "Gatundu north",
        "Gatundu south",
        "Githunguri",
        "Juja",
        "Kabete",
        "Kiambaa",
        "Kiambu",
        "Kikuyu",
        "Limuru",
        "Ruiru",
        "Thika town",
        "lari"
    ]
    },
    {
        "name": "Kilifi",
        "capital": "Kilifi",
        "code": 3,
        "sub_counties": [
        "Genzw",
        "Kaloleni",
        "Kilifi north",
        "Kilifi south",
        "Magarini",
        "Malindi",
        "Rabai"
    ]
    },
    {
        "name": "Kirinyaga",
        "capital": "Kerugoya/Kutus",
        "code": 20,
        "sub_counties": [
        "Kirinyaga central",
        "Kirinyaga east",
        "Kirinyaga west",
        "Mwea east",
        "Mwea west"
    ]
    },
    {
        "name": "Kisii",
        "capital": "Kisii",
        "code": 45,
        "sub_counties": [
            "Gucha",
            "Gucha South",
            "Kenyenya",
            "Kisii central",
            "Kisii south",
            "Masaba south",
            "Kitutu Central",
            "Marani",
            "Nyamache",
            "Sameta"
    ]
    },
    {
        "name": "Kisumu",
        "capital": "Kisumu",
        "code": 42,
        "sub_counties": [
        "Kisumu central",
        "Kisumu east ",
        "Kisumu west",
        "Mohoroni",
        "Nyakach",
        "Nyando",
        "Seme"
    ]
    },
    {
        "name": "Kitui",
        "capital": "Kitui",
        "code": 15,
        "sub_counties": [
        "Ikutha",
        "Katulani",
        "Kisasi",
        "Kitui central",
        "Kitui west ",
        "Lower yatta",
        "Matiyani",
        "Migwani",
        "Mutitu",
        "Mutomo",
        "Muumonikyusu",
        "Mwingi central",
        "Mwingi east",
        "Nzambani",
        "Tseikuru"
    ]
    },
    {
        "name": "Kwale",
        "capital": "Kwale",
        "code": 2,
        "sub_counties": [
        "Kinango",
        "Lungalunga",
        "Msambweni",
        "Mutuga"
    ]
    },
    {
        "name": "Laikipia",
        "capital": "Rumuruti",
        "code": 31,
        "sub_counties": [
        "Laikipia central",
        "Laikipia east",
        "Laikipia north",
        "Laikipia west ",
        "Nyahururu"
    ]
    },
    {
        "name": "Lamu",
        "capital": "Lamu",
        "code": 5,
        "sub_counties": [
        "Lamu East",
        "Lamu West"
    ]
    },
    {
        "name": "Machakos",
        "capital": "Machakos",
        "code": 16,
        "sub_counties": [
        "Kathiani",
        "Machakos town",
        "Masinga",
        "Matungulu",
        "Mavoko",
        "Mwala",
        "Yatta"
    ]
    },
    {
        "name": "Makueni",
        "capital": "Wote",
        "code": 17,
        "sub_counties": [
        "Kaiti",
        "Kibwei west",
        "Kibwezi east",
        "Kilome",
        "Makueni",
        "Mbooni"
    ]
    },
    {
        "name": "Mandera",
        "capital": "Mandera",
        "code": 9,
        "sub_counties": [
        "Banissa",
        "Lafey",
        "Mandera East",
        "Mandera North",
        "Mandera South",
        "Mandera West"
    ]
    },
    {
        "name": "Marsabit",
        "capital": "Marsabit",
        "code": 10,
        "sub_counties": [
        "Laisamis",
        "Moyale",
        "North hor",
        "Saku"
    ]
    },
    {
        "name": "Meru",
        "capital": "Meru",
        "code": 12,
        "sub_counties": [
        "Buuri",
        "Igembe central",
        "Igembe north",
        "Igembe south",
        "Imenti central",
        "Imenti north",
        "Imenti south",
        "Tigania east",
        "Tigania west"
    ]
    },
    {
        "name": "Migori",
        "capital": "Migori",
        "code": 44,
        "sub_counties": [
        "Awendo",
        "Kuria east",
        "Kuria west",
        "Mabera",
        "Ntimaru",
        "Rongo",
        "Suna east",
        "Suna west",
        "Uriri"
    ]
    },
    {
        "name": "Mombasa",
        "capital": "Mombasa City",
        "code": 1,
        "sub_counties": [
        "Changamwe",
        "Jomvu",
        "Kisauni",
        "Likoni",
        "Mvita",
        "Nyali"
    ]
    },
    {
        "name": "Murang\'a",
        "capital": "Murang\'a",
        "code": 21,
        "sub_counties": [
        "Gatanga",
        "Kahuro",
        "Kandara",
        "Kangema",
        "Kigumo",
        "Kiharu",
        "Mathioya",
        "Murang’a south"
    ]
    },
    {
        "name": "Nairobi",
        "capital": "Nairobi City",
        "code": 47,
        "sub_counties": [
        "Dagoretti North Sub County",
        "Dagoretti South Sub County ",
        "Embakasi Central Sub Count",
        "Embakasi East Sub County",
        "Embakasi North Sub County ",
        "Embakasi South Sub County",
        "Embakasi West Sub County",
        "Kamukunji Sub County",
        "Kasarani Sub County ",
        "Kibra Sub County ",
        "Lang\'ata Sub County ",
        "Makadara Sub County",
        "Mathare Sub County ",
        "Roysambu Sub County ",
        "Ruaraka Sub County ",
        "Starehe Sub County ",
        "Westlands Sub County "
    ]
    },
    {
        "name": "Nakuru",
        "capital": "Nakuru",
        "code": 32,
        "sub_counties": [
        "Bahati",
        "Gilgil",
        "Kuresoi north",
        "Kuresoi south",
        "Molo",
        "Naivasha",
        "Nakuru town east",
        "Nakuru town west",
        "Njoro",
        "Rongai",
        "Subukia"
    ]
    },
    {
        "name": "Nandi",
        "capital": "Kapsabet",
        "code": 29,
        "sub_counties": [
        "Aldai",
        "Chesumei",
        "Emgwen",
        "Mosop",
        "Namdi hills",
        "Tindiret"
    ]
    },
    {
        "name": "Narok",
        "capital": "Narok",
        "code": 33,
        "sub_counties": [
        "Narok east",
        "Narok north",
        "Narok south",
        "Narok west",
        "Transmara east",
        "Transmara west"
    ]
    },
    {
        "name": "Nyamira",
        "capital": "Nyamira",
        "code": 46,
        "sub_counties": [
        "Borabu",
        "Manga",
        "Masaba north",
        "Nyamira north",
        "Nyamira south"
    ]
    },
    {
        "name": "Nyandarua",
        "capital": "Ol Kalou",
        "code": 18,
        "sub_counties": [
        "Kinangop",
        "Kipipiri",
        "Ndaragwa",
        "Ol Kalou",
        "Ol joro orok"
    ]
    },
    {
        "name": "Nyeri",
        "capital": "Nyeri",
        "code": 19,
        "sub_counties": [
        "Kieni east",
        "Kieni west",
        "Mathira east",
        "Mathira west",
        "Mkurweni",
        "Nyeri town",
        "Othaya",
        "Tetu"
    ]
    },
    {
        "name": "Samburu",
        "capital": "Maralal",
        "code": 25,
        "sub_counties": [
        "Samburu east",
        "Samburu north",
        "Samburu west"
    ]
    },
    {
        "name": "Siaya",
        "capital": "Siaya",
        "code": 41,
        "sub_counties": [
        "Alego usonga",
        "Bondo",
        "Gem",
        "Rarieda",
        "Ugenya",
        "Unguja"
    ]
    },
    {
        "name": "Taita-Taveta",
        "capital": "Voi",
        "code": 6,
        "sub_counties": [
        "Mwatate",
        "Taveta",
        "Voi",
        "Wundanyi"
    ]
    },
    {
        "name": "Tana River",
        "capital": "Hola",
        "code": 4,
        "sub_counties": [
        "Bura",
        "Galole",
        "Garsen"
    ]
    },
    {
        "name": "Tharaka-Nithi",
        "capital": "Chuka",
        "code": 13,
        "sub_counties": [
        "Chuka",
        "Igambangobe",
        "Maara",
        "Muthambi",
        "Tharak north",
        "Tharaka south"
    ]
    },
    {
        "name": "Trans-Nzoia",
        "capital": "Kitale",
        "code": 26,
        "sub_counties": [
        "Cherangany",
        "Endebess",
        "Kiminini",
        "Kwanza",
        "Saboti"
    ]
    },
    {
        "name": "Turkana",
        "capital": "Lodwar",
        "code": 23,
        "sub_counties": [
        "Loima",
        "Turkana central",
        "Turkana east",
        "Turkana north",
        "Turkana south"
    ]
    },
    {
        "name": "Uasin Gishu",
        "capital": "Eldoret",
        "code": 27,
        "sub_counties": [
        "Ainabkoi",
        "Kapseret",
        "Kesses",
        "Moiben",
        "Soy",
        "Turbo"
    ]
    },
    {
        "name": "Vihiga",
        "capital": "Vihiga",
        "code": 38,
        "sub_counties": [
        "Emuhaya",
        "Hamisi",
        "Luanda",
        "Sabatia",
        "vihiga"
    ]
    },
    {
        "name": "Wajir",
        "capital": "Wajir",
        "code": 8,
        "sub_counties": [
        "Eldas",
        "Tarbaj",
        "Wajir East",
        "Wajir North",
        "Wajir South",
        "Wajir West"
    ]
    },
    {
        "name": "West Pokot",
        "capital": "Kapenguria",
        "code": 24,
        "sub_counties": [
        "Central Pokot",
        "North Pokot",
        "Pokot South",
        "West Pokot"
    ]
    }
]';
        $data = json_decode($json_data);



        foreach ($data as $county) {
            $cnty = new \App\Models\Directory\County();
            $cnty->country_id = 104;
            $cnty->name = $county->name;
            $cnty->capital = $county->capital;
            $cnty->code = $county->code;
            $cnty->save();

            foreach ($county->sub_counties as $sub) {
                $sub_county = new \App\Models\Directory\SubCounty();
                $sub_county->county_id = $cnty->id;
                $sub_county->name = $sub;
                $sub_county->save();
            }
        }
    }
}
