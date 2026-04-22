# Laminas Migration Audit

This repository still contains substantial Zend Framework 1 usage (`Zend_*` classes).

## Current scan snapshot

- `require_once 'Zend/...';` references in application code: **0**
- `Zend_*` class references in `application/`: **4884**
- `Zend\\...` namespace references in `application/`: **0**

## What was migrated in this pass

1. Removed all direct `require_once 'Zend/...'` references from application-layer models/helpers.
2. Kept class usage autoload-driven so migration can continue safely without hard-coded includes.
3. Migrated ACL engine in `application/modules/default/plugins/AccessControl.php` from `Zend_Acl` / `Zend_Acl_Resource` to Laminas ACL classes.
4. Preserved runtime behavior while reducing coupling to direct Zend file paths.

## Recommended phased migration to Laminas

1. **Stabilize bootstrap/runtime split**
   - Keep legacy runtime for current modules.
   - Keep Laminas runtime under `zf3/` for newly migrated modules.

2. **Migrate shared services first**
   - DB adapters
   - Auth/session
   - view helpers/layout logic

3. **Migrate module-by-module**
   - Port controllers/models from `Zend_*` to Laminas components.
   - Add module tests for each migrated module.

4. **Retire legacy Zend tree**
   - Remove `Zend/` only after all module paths no longer depend on `Zend_*` classes.

## Re-run commands

```bash
rg -n "require_once 'Zend/" application *.php
rg -n "Zend_" application --glob '*.php' | wc -l
rg -n "Zend\\\\" application --glob '*.php' | wc -l
```
