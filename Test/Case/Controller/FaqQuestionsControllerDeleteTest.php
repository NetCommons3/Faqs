<?php
/**
 * Delete test on FaqQuestionsController
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FaqQuestionsController', 'Faqs.Controller');
App::uses('FaqsBaseController', 'Faqs.Test/Case/Controller');

/**
 * Delete test on FaqQuestionsController
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Faqs\Test\Case\Controller
 */
class FaqQuestionsControllerDeleteTest extends FaqsBaseController {

/**
 * setUp
 *
 * @return void
 */
	public function setUp() {
		$this->generate(
			'Faqs.FaqQuestions',
			[
				'components' => [
					'Auth' => ['user'],
					'Session',
					'Security',
				]
			]
		);
		parent::setUp();
	}

/**
 * Expect delete action
 *
 * @return void
 */
	public function testDelete() {
		//RolesControllerTest::login($this);
		//
		//$frameId = '100';
		//$view = $this->testAction(
		//		'/faqs/blocks/index/' . $frameId,
		//		array(
		//			'method' => 'get',
		//			'return' => 'view',
		//		)
		//	);
		//$this->assertTextEquals('index', $this->controller->view);
		//
		//$this->assertTextContains('/frames/frames/edit/' . $frameId, $view);
		//$this->assertTextContains('/faqs/blocks/add/' . $frameId, $view);
		//$this->assertTextContains('/faqs/blocks/edit/' . $frameId . '/100', $view);
		//$this->assertTextContains('/faqs/blocks/edit/' . $frameId . '/101', $view);
		//
		//AuthGeneralControllerTest::logout($this);
	}
}
