<?php 
require '../app/start.php';

if (!empty($_POST)) {
	$label = $_POST['label'];
	$title = $_POST['title'];
	$slug = $_POST['slug'];
	$body = $_POST['body'];
	$id = $_POST['id'];

	$updatePage = $db->prepare("
		UPDATE pages 
			SET
				label = :label,
				title = :title,
				slug = :slug,
				body = :body,
				updated = NOW()
			WHERE id = :id
		");
	$updatePage->execute( [
		'label' => $label,
		'title' => $title,
		'slug' => $slug,
		'body' => $body,
		'id'  => $id
		]);
	header('Location: '.BASE_URL.'/admin/list.php');
}

if (!isset($_GET['id'])) {
	header('Location: '. BASE_URL.'/admin/list.php');
	die();
}

$page = $db->prepare("
	SELECT id, title, label, body, slug
	FROM pages
	WHERE id = :id 
	");
$page->execute(['id' => $_GET['id']]);
$page = $page->fetch(PDO::FETCH_ASSOC);


require VIEW_ROOT.'/admin/edit.php';

 ?>