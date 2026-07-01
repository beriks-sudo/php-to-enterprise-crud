.DEFAULT_GOAL := help

.PHONY: help php-version composer-version node-version check

help:
	@echo "Available targets:"
	@echo "  make php-version       - show PHP CLI version"
	@echo "  make composer-version  - show Composer version"
	@echo "  make node-version      - show Node and npm versions"
	@echo "  make check             - run safe environment checks"

php-version:
	php -v

composer-version:
	composer --version

node-version:
	node -v
	npm -v

check: php-version composer-version node-version

.DEFAULT:
	@$(MAKE) help
	@echo ""
	@echo "Unknown target: $@"
	@exit 2