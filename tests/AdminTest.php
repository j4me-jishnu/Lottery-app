<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AdminTest extends TestCase{
  private static $app;

  public static function setUpBeforeClass(): void{
    self::$app=new Admin();
  }

}
