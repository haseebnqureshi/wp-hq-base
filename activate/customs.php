<?php

	// $phases = array(
	// 	(object) array(
	// 		'name' => 'Feature Scoping',
	// 		'description' => 'Figuring out what features are going in this project.',
	// 		'weight' => 10
	// 	),
	// 	(object) array(
	// 		'name' => 'Planning',
	// 		'description' => 'Scheduling our workload to all hands on deck.',
	// 		'weight' => 10
	// 	),
	// 	(object) array(
	// 		'name' => 'Coding',
	// 		'description' => 'Let\'s get to work. Time to crank these features out.',
	// 		'weight' => 40
	// 	),
	// 	(object) array(
	// 		'name' => 'QA & Testing',
	// 		'description' => 'Testing and testing. Rather have it fail in our hands, than in our clients\' or users\'',
	// 		'weight' => 30
	// 	),
	// 	(object) array(
	// 		'name' => 'Release',
	// 		'description' => 'Delivery to the client, or pushing it out to the world!',
	// 		'weight' => 10
	// 	)
	// );

	// $phaseIds = array();
	// foreach ($phases as $phase) {
	// 	$phase->id = wp_insert_post(array(
	// 		'post_title' => $phase->name,
	// 		'post_type' => 'phases',
	// 		'post_status' => 'publish',
	// 		'meta_input' => array(
	// 			'description' => $phase->description,
	// 			'weight' => $phase->weight
	// 		)
	// 	));
	// 	$phaseIds[] = $phase->id;
	// }

	// $projectId = wp_insert_post(array(
	// 	'post_title' => 'New Project',
	// 	'post_type' => 'projects',
	// 	'post_status' => 'publish',
	// 	'meta_input' => array(
	// 		'description' => 'This is an example project with multiple phases. Start using this and see why it feels almost impossible to work without this system.',
	// 		'phases' => serialize($phaseIds),
	// 		'start_date' => date('Ymd', time()),
	// 		'end_date' => date('Ymd', time() + (60 * 60 * 24 * 10))
	// 	)
	// ));

?>