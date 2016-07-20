# ValueobjectTranspiler

A command line tool that generates PHP classes for ValueObjects, Entities, Commands and Events, based on a Yaml config file.

### Config file
Here is a sample config file
```yaml
# ValueObjects
value\Integer: is intVal

value\Quantity: is intval and between 1, 20

value\Range:
  min: value\Integer
  max: value\Integer

# Collections
value\Products: contains entity\Product

# Entites
entity\User:
  id: value\Id
  name: value\Name

entity\Product:
  id: value\Id
  product_id: value\ProductId
  quantity: value\Quantity

# Commands
command\CreateUser:
  id: value\Id
  user: entity\User

# Events
event\ProductCreated:
  id: value\Id
  product: entity\Product
  quantity: value\Quantity

```


### Location of config file
Put the config file in the folder that should contain the generated code.

### Namespaces
The script will figure out namespaces based on the folder structure (it's PSR0 compliant).
If you set the root as "/home/project/" and it finds a config file at "/home/project/cart/values/vos.yaml"
Then it will set the namespace as "<?php namespace Cart\Values; ?>

### Generating
To generate code simple call the following in console.

```
php generate.php [path_of_your_project_root]
```

The system will scan for any vos.yaml files in that folder and any of its subfodlers.