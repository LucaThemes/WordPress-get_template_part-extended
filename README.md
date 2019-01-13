# WordPress get_template_part extended
Many WordPress developers struggle to load a template with optional parameters, unfortunately WordPress doesn't allow it.
I created a simple function that includes specified file, depending on parameters passed to function.

# Usage
Typically you place the function in your functions.php file, although it depends on your theme structure. Then simply call the function instead of usual get_template_part(). 
If there are no additional parameters passed besides file name, it will work as a standard get_template_part() core function.

# Currently available parameters (1.0.0)
`file` - exact file name (with slug), with no php file extension,<br />
`subdir` - subdirectory; if not specified, core theme directory will be used,<br />
`return` - optional, by default function will echo the file.

# Example
```
lt_get_template_part( 'content-grid', [
  'subdir' => 'template-parts',
  'return' => false
]);
```

# Changelog
1.0.0 (13-01-2019)
Function created.
