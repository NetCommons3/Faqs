<?php
/**
 * FaqQuestionOrders edit
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

echo $this->NetCommonsHtml->script('/faqs/js/faqs.js');

$faqQuestions = NetCommonsAppController::camelizeKeyRecursive($this->data['FaqQuestions']);
$faqQuestionsMap = [];
foreach ($faqQuestions as $key => $faqQuestion) {
	if (isset($faqQuestion['faqQuestion']['key'])) {
		$faqQuestionsMap[$faqQuestion['faqQuestion']['key']] = $key;
	}
}
?>

<div class="nc-content-list" ng-controller="FaqQuestionOrders" class="nc-content-list"
	 ng-init="initialize(<?php echo h(json_encode(['faqQuestions' => $faqQuestions, 'faqQuestionsMap' => $faqQuestionsMap])); ?>)" ng-cloak>

	<?php echo $this->NetCommonsHtml->blockTitle($faq['name']); ?>

	<article>
		<?php echo $this->NetCommonsForm->create('FaqQuestionOrder'); ?>
			<?php foreach ($faqQuestionsMap as $key => $value) : ?>
				<?php echo $this->NetCommonsForm->hidden('FaqQuestions.' . $value . '.FaqQuestionOrder.id'); ?>
				<?php echo $this->NetCommonsForm->hidden('FaqQuestions.' . $value . '.FaqQuestionOrder.faq_key'); ?>
				<?php echo $this->NetCommonsForm->hidden('FaqQuestions.' . $value . '.FaqQuestionOrder.faq_question_key'); ?>
				<?php $this->NetCommonsForm->unlockField('FaqQuestions.' . $value . '.FaqQuestionOrder.weight'); ?>
			<?php endforeach; ?>

			<?php echo $this->NetCommonsForm->hidden('Block.id'); ?>
			<?php echo $this->NetCommonsForm->hidden('Block.key'); ?>
			<?php echo $this->NetCommonsForm->hidden('Faq.id'); ?>
			<?php echo $this->NetCommonsForm->hidden('Faq.key'); ?>

			<div ng-hide="faqQuestions.length">
				<p><?php echo __d('net_commons', 'Not found.'); ?></p>
			</div>

			<div class="table-responsive" ng-show="faqQuestions.length">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th></th>
							<th>
								<?php echo $this->Paginator->sort('FaqQuestion.question', __d('faqs', 'Question')); ?>
							</th>
							<th>
								<?php echo $this->Paginator->sort('CategoryOrder.weight', __d('categories', 'Category')); ?>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="q in faqQuestions track by $index">
							<td>
								<div class="text-nowrap">
									<button type="button" class="btn btn-default btn-sm"
											ng-click="move('up', $index)" ng-disabled="$first">
										<span class="glyphicon glyphicon-arrow-up"></span>
									</button>

									<button type="button" class="btn btn-default btn-sm"
											ng-click="move('down', $index)" ng-disabled="$last">
										<span class="glyphicon glyphicon-arrow-down"></span>
									</button>

									<input type="hidden" name="data[FaqQuestions][{{getIndex(q.faqQuestion.key)}}][FaqQuestionOrder][weight]"
											ng-value="{{$index + 1}}">
								</div>
							</td>
							<td>
								{{q.faqQuestion.question}}
							</td>
							<td>
								<div class="text-nowrap">
									{{q.categoriesLanguage.name}}
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="text-center">
				<?php echo $this->Button->cancelAndSave(
						__d('net_commons', 'Cancel'),
						__d('net_commons', 'OK'),
						NetCommonsUrl::backToIndexUrl()
					); ?>
			</div>

		<?php echo $this->NetCommonsForm->end(); ?>
	</article>
</div>
