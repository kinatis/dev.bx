<?php

class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{
	public function getValidateFailSamples(): array
	{
		return [
			'empty' => [
				[],
			],
			'filled but empty' => [
				[
					'Name' => '',
					'PersonalAcc' => '',
					'BankName' => '',
					'BIC' => '',
					'CorrespAcc' => '',
				]
			],
            'filled but long value ' => [
                [
                    'Name' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid dolore et expedita ipsam laborum molestias nesciunt suscipit veritatis voluptatum! A accusamus atque blanditiis doloremque error exercitationem expedita harum ipsa iste itaque iure labore minus molestias natus nihil quas quia repellendus repudiandae rerum sint tenetur, ullam vel? Alias cupiditate debitis eaque magni sequi! Animi dolore doloribus esse hic illum minus molestiae neque. At blanditiis commodi delectus ipsa minima omnis perferendis, quidem velit. Architecto consequuntur debitis delectus doloremque earum in iste, mollitia non officiis perferendis praesentium quae reiciendis sequi sunt temporibus voluptatibus voluptatum. Ab atque enim laboriosam maiores nisi porro quam rem sed? Alias asperiores aut beatae consectetur cum, cumque cupiditate deleniti deserunt ducimus ea et eveniet excepturi explicabo facilis fugit id ipsa ipsam, minus nam neque nobis numquam officiis placeat porro praesentium quam quo, reiciendis sed soluta tempora tempore totam voluptate voluptatem. A aliquam aliquid culpa deserunt doloremque, earum facilis, fuga, fugiat ipsam libero maiores mollitia nisi quos reprehenderit sunt. Accusamus amet deserunt, dicta dolorem error impedit iusto, libero magni nisi totam veritatis voluptatum. Amet corporis cupiditate delectus ea eveniet hic iure officia praesentium veritatis voluptate! Aliquam animi, blanditiis deserunt eveniet excepturi ipsam laborum natus praesentium quam, quod veritatis vitae.',
                    'PersonalAcc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi, aperiam at atque consectetur culpa cumque dolor dolore dolorum enim eos eveniet exercitationem expedita fuga fugit harum hic inventore ipsam laborum magnam maiores mollitia nam nihil nobis obcaecati odio officia perspiciatis praesentium provident recusandae tempora veniam veritatis vitae voluptas voluptatum.',
                    'BankName' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi, aperiam at atque consectetur culpa cumque dolor dolore dolorum enim eos eveniet exercitationem expedita fuga fugit harum hic inventore ipsam laborum magnam maiores mollitia nam nihil nobis obcaecati odio officia perspiciatis praesentium provident recusandae tempora veniam veritatis vitae voluptas voluptatum.',
                    'BIC' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi, aperiam at atque consectetur culpa cumque dolor dolore dolorum enim eos eveniet exercitationem expedita fuga fugit harum hic inventore ipsam laborum magnam maiores mollitia nam nihil nobis obcaecati odio officia perspiciatis praesentium provident recusandae tempora veniam veritatis vitae voluptas voluptatum.',
                    'CorrespAcc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi, aperiam at atque consectetur culpa cumque dolor dolore dolorum enim eos eveniet exercitationem expedita fuga fugit harum hic inventore ipsam laborum magnam maiores mollitia nam nihil nobis obcaecati odio officia perspiciatis praesentium provident recusandae tempora veniam veritatis vitae voluptas voluptatum.',
                ]
            ],
            'filled but bool value' => [
                [
                    'Name' => true,
                    'PersonalAcc' => true,
                    'BankName' => true,
                    'BIC' => true,
                    'CorrespAcc' => true,
                ]
            ],
            'filled but space value' => [
                [
                    'Name' => "    ",
                    'PersonalAcc' => "    ",
                    'BankName' => "    ",
                    'BIC' => "    ",
                    'CorrespAcc' => "    ",
                ]
            ],

		];
	}




	/**
	 * @dataProvider getValidateFailSamples
	 *
	 * @param array $fields
	 */
	public function testValidateFail(array $fields): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$result = $dataGenerator->validate();

		static::assertFalse($result->isSuccess());
	}




	public function testThatValidateSuccess(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$dataGenerator
			->setName('Name')
			->setBIC('BIC')
			->setBankName('BankName')
			->setCorrespondentAccount('CorrespondentAccount')
			->setPersonalAccount('CorrespondentAccount')
		;

		$result = $dataGenerator->validate();

		static::assertTrue($result->isSuccess());
	}


	public function testGetData(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$data = $dataGenerator->getData();

		static::assertEquals('ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=', $data);
	}



    public function testPickupDelimiterFromGetData():void
    {
        $fields = [
                    'Name' => '|',
                    'PersonalAcc' => '|',
                    'BankName' => '|',
                    'BIC' => '|',
                    'CorrespAcc' => '|',
        ];
        $dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();
        $dataGenerator->setFields($fields);
        $data = $dataGenerator->getData();

        static::assertEquals('ST00012~Name=|~PersonalAcc=|~BankName=|~BIC=|~CorrespAcc=|', $data);
    }

    public function testPickupTwoDelimiterFromGetData():void
    {
        $fields = [
            'Name' => '1|',
            'PersonalAcc' => '',
            'BankName' => '',
            'BIC' => '',
            'CorrespAcc' => '',
        ];
        $dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();
        $dataGenerator->setFields($fields);
        $data = $dataGenerator->getData();

        static::assertEquals('ST00012~Name=1|~PersonalAcc=~BankName=~BIC=~CorrespAcc=', $data);
    }


}
