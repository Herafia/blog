<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		for ($nbArticles = 0; $nbArticles<=9; $nbArticles++) {
			for ($nbCategories = 0; $nbCategories<=4; $nbCategories++) {
				$article = new Article();
				$faker = Faker\Factory::create('fr_FR');
				$article->setTitle($faker->name);
				$article->setContent($faker->text($maxNbChars = 50));
				
				$manager->persist($article);
				$article->setCategory($this->getReference('categorie_' . $nbCategories));
				$manager->flush();
			}
		}

	}
	
	public function getDependencies()
	{
		return [CategoryFixtures::class];
	}
}
