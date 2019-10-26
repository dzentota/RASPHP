<?php return array (
  '364712e7cdb07f0abe5f34ffa2dd54b9111e61fe' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'expr_type' => 'colref',
      ),
    ),
    1 => 
    array (
      0 => 
      array (
        'expr_type' => 'table',
        'table' => 'users',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 'users',
          ),
        ),
        'join_type' => 'JOIN',
      ),
    ),
    2 => 
    array (
      0 => 
      array (
        'expr_type' => 'colref',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 'email',
          ),
        ),
      ),
      1 => 
      array (
        'expr_type' => 'operator',
      ),
      2 => 
      array (
        'expr_type' => 'const',
      ),
      3 => 
      array (
        'expr_type' => 'operator',
      ),
      4 => 
      array (
        'expr_type' => 'colref',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 'password',
          ),
        ),
      ),
      5 => 
      array (
        'expr_type' => 'operator',
      ),
      6 => 
      array (
        'expr_type' => 'function',
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'const',
          ),
        ),
      ),
    ),
  ),
);