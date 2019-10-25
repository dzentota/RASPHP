
extern zend_class_entry *utils_greeting_ce;

ZEPHIR_INIT_CLASS(Utils_Greeting);

PHP_METHOD(Utils_Greeting, say);

ZEPHIR_INIT_FUNCS(utils_greeting_method_entry) {
	PHP_ME(Utils_Greeting, say, NULL, ZEND_ACC_PUBLIC|ZEND_ACC_STATIC)
	PHP_FE_END
};
