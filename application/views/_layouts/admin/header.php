<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<link rel="icon" href="<?=base_url().'assets/images/site/'.$this->settings->favicon;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?=$title.' - '.$this->settings->title;?></title>
	<link href="<?=base_url();?>assets/admin/css/plugins.min.css" rel="stylesheet">
	<link href="<?=base_url();?>assets/admin/css/app.min.css" rel="stylesheet">
</head>

<style>
.pagination {
	display: inline-block;
	float: right;
padding-top: 15px;
	}
	
	li.first.active, li.active{
    padding: 6px 10px;
    background-color: #304ffe;
    margin-right: 5px;
    color: #fff;
}

	.pagination li a {
	padding: 6px 10px;
	background-color: #fff;
	border: 1px solid #ddd;
	margin-right: 5px;
	}
	
	.pagination li {
	display: inline-block;
	}
	
	.pagination .active span {
	background-color: #1c2260;
	padding: 6px 10px;
	color: #fff;
	border: 1px solid #1c2260;
	cursor: not-allowed;
	}
	
	.pagination li a:hover {
    background-color: #304ffe;
    color: #fff;
    border: 1px solid #1c2260;
}
	
	.pagination .disabled span {
	padding: 6px 10px;
	background-color: #fff;
	border: 1px solid #ddd;
	cursor: not-allowed;
	}
</style>
<body class="<?= ($this->sess)?'style':'';?>">