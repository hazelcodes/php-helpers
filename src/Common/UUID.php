<?php 

namespace HazelCodes\Common;

class UUID {
  static public function generate() : string {
    return md5(uniqid(null, true));
  }
}