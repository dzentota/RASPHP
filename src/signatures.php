<?php return array (
  '3f23dafea1a5aef4e15f0fa6a645e1b502bd1a0e' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'expr_type' => 'reserved',
      ),
      1 => 
      array (
        'expr_type' => 'expression',
        'alias' => 
        array (
          'no_quotes' => 
          array (
            'parts' => 
            array (
              0 => 'c1',
            ),
          ),
        ),
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'const',
          ),
          1 => 
          array (
            'expr_type' => 'operator',
          ),
          2 => 
          array (
            'expr_type' => 'const',
          ),
        ),
      ),
      2 => 
      array (
        'expr_type' => 'expression',
        'alias' => 
        array (
          'no_quotes' => 
          array (
            'parts' => 
            array (
              0 => 'c2',
            ),
          ),
        ),
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'const',
          ),
          1 => 
          array (
            'expr_type' => 'operator',
          ),
          2 => 
          array (
            'expr_type' => 'const',
          ),
        ),
      ),
      3 => 
      array (
        'expr_type' => 'aggregate_function',
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'colref',
            'no_quotes' => 
            array (
              'parts' => 
              array (
                0 => 'c2',
              ),
            ),
          ),
        ),
      ),
      4 => 
      array (
        'expr_type' => 'aggregate_function',
        'alias' => 
        array (
          'no_quotes' => 
          array (
            'parts' => 
            array (
              0 => 'sum_c3',
            ),
          ),
        ),
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'colref',
            'no_quotes' => 
            array (
              'parts' => 
              array (
                0 => 'c3',
              ),
            ),
          ),
        ),
      ),
      5 => 
      array (
        'expr_type' => 'expression',
        'alias' => 
        array (
          'no_quotes' => 
          array (
            'parts' => 
            array (
              0 => 'case_statement',
            ),
          ),
        ),
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'const',
          ),
          1 => 
          array (
            'expr_type' => 'operator',
          ),
          2 => 
          array (
            'expr_type' => 'reserved',
          ),
          3 => 
          array (
            'expr_type' => 'reserved',
          ),
          4 => 
          array (
            'expr_type' => 'colref',
            'no_quotes' => 
            array (
              'parts' => 
              array (
                0 => 'quantity',
              ),
            ),
          ),
          5 => 
          array (
            'expr_type' => 'operator',
          ),
          6 => 
          array (
            'expr_type' => 'const',
          ),
          7 => 
          array (
            'expr_type' => 'reserved',
          ),
          8 => 
          array (
            'expr_type' => 'const',
          ),
          9 => 
          array (
            'expr_type' => 'reserved',
          ),
          10 => 
          array (
            'expr_type' => 'const',
          ),
          11 => 
          array (
            'expr_type' => 'reserved',
          ),
        ),
      ),
      6 => 
      array (
        'expr_type' => 'colref',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 't4',
          ),
        ),
      ),
      7 => 
      array (
        'expr_type' => 'expression',
        'alias' => 
        array (
          'no_quotes' => 
          array (
            'parts' => 
            array (
              0 => 'subquery',
            ),
          ),
        ),
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'subquery',
            'sub_tree' => 
            array (
              'SELECT' => 
              array (
                0 => 
                array (
                  'expr_type' => 'expression',
                  'sub_tree' => 
                  array (
                    0 => 
                    array (
                      'expr_type' => 'colref',
                      'no_quotes' => 
                      array (
                        'parts' => 
                        array (
                          0 => 'c1',
                        ),
                      ),
                    ),
                    1 => 
                    array (
                      'expr_type' => 'operator',
                    ),
                    2 => 
                    array (
                      'expr_type' => 'colref',
                      'no_quotes' => 
                      array (
                        'parts' => 
                        array (
                          0 => 'c2',
                        ),
                      ),
                    ),
                  ),
                ),
              ),
              'FROM' => 
              array (
                0 => 
                array (
                  'expr_type' => 'table',
                  'no_quotes' => 
                  array (
                    'parts' => 
                    array (
                      0 => 't1',
                    ),
                  ),
                  'alias' => 
                  array (
                    'no_quotes' => 
                    array (
                      'parts' => 
                      array (
                        0 => 'inner_t1',
                      ),
                    ),
                  ),
                ),
              ),
              'LIMIT' => 
              array (
              ),
            ),
          ),
        ),
      ),
    ),
    1 => 
    array (
      0 => 'into',
      1 => '@a1',
      2 => '@a2',
      3 => '@a3',
      4 => 'into',
      5 => 'outfile',
      6 => '"/xyz"',
    ),
    2 => 
    array (
      0 => 
      array (
        'expr_type' => 'table',
        'table' => 't1',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 't1',
          ),
        ),
        'alias' => 
        array (
          'no_quotes' => 
          array (
            'parts' => 
            array (
              0 => 'the_t1',
            ),
          ),
        ),
        'join_type' => 'JOIN',
      ),
      1 => 
      array (
        'expr_type' => 'table',
        'table' => 't2',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 't2',
          ),
        ),
        'join_type' => 'LEFT',
        'ref_clause' => 
        array (
          0 => 
          array (
            'expr_type' => 'column-list',
            'sub_tree' => 
            array (
              0 => 
              array (
                'expr_type' => 'colref',
                'no_quotes' => 
                array (
                  'parts' => 
                  array (
                    0 => 'c1',
                  ),
                ),
              ),
              1 => 
              array (
                'expr_type' => 'colref',
                'no_quotes' => 
                array (
                  'parts' => 
                  array (
                    0 => 'c2',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      2 => 
      array (
        'expr_type' => 'table',
        'table' => 't3',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 't3',
          ),
        ),
        'alias' => 
        array (
          'no_quotes' => 
          array (
            'parts' => 
            array (
              0 => 'tX',
            ),
          ),
        ),
        'join_type' => 'JOIN',
        'ref_clause' => 
        array (
          0 => 
          array (
            'expr_type' => 'colref',
            'no_quotes' => 
            array (
              'parts' => 
              array (
                0 => 'tX',
              ),
            ),
          ),
          1 => 
          array (
            'expr_type' => 'operator',
          ),
          2 => 
          array (
            'expr_type' => 'colref',
            'no_quotes' => 
            array (
              'parts' => 
              array (
                0 => 'the_t1',
              ),
            ),
          ),
        ),
      ),
      3 => 
      array (
        'expr_type' => 'table',
        'table' => 't4',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 't4',
          ),
        ),
        'alias' => 
        array (
          'no_quotes' => 
          array (
            'parts' => 
            array (
              0 => 't4_x',
            ),
          ),
        ),
        'join_type' => 'JOIN',
        'ref_clause' => 
        array (
          0 => 
          array (
            'expr_type' => 'column-list',
            'sub_tree' => 
            array (
              0 => 
              array (
                'expr_type' => 'colref',
                'no_quotes' => 
                array (
                  'parts' => 
                  array (
                    0 => 'x',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    3 => 
    array (
      0 => 
      array (
        'expr_type' => 'colref',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 'c1',
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
            0 => 'c2',
          ),
        ),
      ),
      5 => 
      array (
        'expr_type' => 'operator',
      ),
      6 => 
      array (
        'expr_type' => 'in-list',
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'const',
          ),
          1 => 
          array (
            'expr_type' => 'const',
          ),
          2 => 
          array (
            'expr_type' => 'const',
          ),
          3 => 
          array (
            'expr_type' => 'const',
          ),
        ),
      ),
      7 => 
      array (
        'expr_type' => 'operator',
      ),
      8 => 
      array (
        'expr_type' => 'reserved',
      ),
      9 => 
      array (
        'expr_type' => 'subquery',
        'sub_tree' => 
        array (
          'SELECT' => 
          array (
            0 => 
            array (
              'expr_type' => 'const',
            ),
          ),
          'FROM' => 
          array (
            0 => 
            array (
              'expr_type' => 'table',
              'no_quotes' => 
              array (
                'parts' => 
                array (
                  0 => 'some_other_table',
                ),
              ),
              'alias' => 
              array (
                'no_quotes' => 
                array (
                  'parts' => 
                  array (
                    0 => 'another_table',
                  ),
                ),
              ),
            ),
          ),
          'WHERE' => 
          array (
            0 => 
            array (
              'expr_type' => 'colref',
              'no_quotes' => 
              array (
                'parts' => 
                array (
                  0 => 'x',
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
          ),
        ),
      ),
      10 => 
      array (
        'expr_type' => 'operator',
      ),
      11 => 
      array (
        'expr_type' => 'bracket_expression',
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'const',
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
            'expr_type' => 'const',
          ),
          5 => 
          array (
            'expr_type' => 'operator',
          ),
          6 => 
          array (
            'expr_type' => 'const',
          ),
        ),
      ),
    ),
    4 => 
    array (
      0 => 
      array (
        'expr_type' => 'pos',
      ),
      1 => 
      array (
        'expr_type' => 'pos',
      ),
    ),
    5 => 
    array (
      0 => 
      array (
        'expr_type' => 'aggregate_function',
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'colref',
            'no_quotes' => 
            array (
              'parts' => 
              array (
                0 => 'c2',
              ),
            ),
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
    ),
    6 => 
    array (
      0 => 
      array (
        'expr_type' => 'pos',
      ),
      1 => 
      array (
        'expr_type' => 'alias',
        'no_quotes' => 
        array (
          'parts' => 
          array (
            0 => 'c1',
          ),
        ),
      ),
    ),
    7 => 
    array (
      0 => 'offset',
      1 => 'rowcount',
    ),
    8 => 
    array (
      0 => 
      array (
        'expr_type' => 'expression',
        'base_expr' => 'FOR UPDATE',
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'reserved',
            'base_expr' => 'FOR',
          ),
          1 => 
          array (
            'expr_type' => 'reserved',
            'base_expr' => 'UPDATE',
          ),
        ),
      ),
      1 => 
      array (
        'expr_type' => 'expression',
        'base_expr' => 'LOCK IN SHARE MODE',
        'sub_tree' => 
        array (
          0 => 
          array (
            'expr_type' => 'reserved',
            'base_expr' => 'LOCK',
          ),
          1 => 
          array (
            'expr_type' => 'reserved',
            'base_expr' => 'IN',
          ),
          2 => 
          array (
            'expr_type' => 'reserved',
            'base_expr' => 'SHARE',
          ),
          3 => 
          array (
            'expr_type' => 'reserved',
            'base_expr' => 'MODE',
          ),
        ),
      ),
    ),
  ),
);