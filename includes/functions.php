<?php
require_once __DIR__.'/../config.php';
function e(?string $s):string{return htmlspecialchars($s??'',ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8');}
function go(string $p):never{header('Location: '.$p);exit;}
function csrf():string{if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function check_csrf():void{if(!hash_equals(csrf(),(string)($_POST['csrf']??''))){http_response_code(403);exit('Invalid form token.');}}
function me():?array{return $_SESSION['user']??null;}
function login_required(?string $role=null):array{$u=me();if(!$u)go('login.php');if($role&&$u['role']!==$role){http_response_code(403);exit('Not authorized');}return $u;}
function flash(string $m,string $type='ok'):void{$_SESSION['flash']=[$m,$type];}
function notice(int $uid,string $msg,string $type='info'):void{$s=db()->prepare('INSERT INTO notifications(user_id,message,type) VALUES(?,?,?)');$s->execute([$uid,$msg,$type]);}
function score(array $d,string $loc):int{return min(100,50+((int)$d['eligible']?25:0)+($d['availability']==='Available'?15:0)+($loc&&stripos($d['location'],$loc)!==false?10:0));}
