<?php

namespace App\DataFixtures;

use App\Entity\Contrats;
use App\Entity\Offres;
use App\Entity\Typecontrats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OffresFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        //contrat
        $cdd = new Contrats();
        $cdd->setName('CDD');
        $manager->persist($cdd);

        $cdi = new Contrats();
        $cdi->setName('CDI');
        $manager->persist($cdi);

        $freelance = new Contrats();
        $freelance->setName('FREELANCE');
        $manager->persist($freelance);

        //type_contrat
        $temps_plein = new Typecontrats();
        $temps_plein->setType('Temps Plein');
        $manager->persist($temps_plein);

        $temps_partiel = new Typecontrats();
        $temps_partiel->setType(' Temps partiel');
        $manager->persist($temps_partiel);

        //offres
        for ($i = 0; $i < 25; $i++) {
            $titre = $faker->company;
            $desc = $faker->paragraph($nbSentences = 5, $variableNbSentences = true);
            $adresse = $faker->address;
            $code_post = str_replace(' ', '', $faker->postcode);
            $ville = $faker->city;
            $debut_contrat = $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
            $up_date = $faker->dateTimeBetween($startDate = $debut_contrat, $endDate = 'now', $timezone = null);
            $contrat = $faker->randomElement($Array = array($cdd, $freelance, $cdi));
            $type = $faker->randomElement($array = array($temps_plein, $temps_partiel));

            if ($contrat != $cdi) {
                $fin_de_mission = $faker->dateTimeBetween($startDate = 'now', $endDate = '5 years');
            } else {
                $fin_de_mission = null;
            }

            $offre = new Offres();
            $offre->setTitre($titre)
                ->setDescription($desc)
                ->setAdresse($adresse)
                ->setCodepostal($code_post)
                ->setVille($ville)
                ->setCreatedat($debut_contrat)
                ->setUpdatedat($up_date)
                ->setMissionend($fin_de_mission)
                ->setContrat($contrat)
                ->setTypecontrat($type);
            $manager->persist($offre);
        }
        $manager->flush();
    }
}
