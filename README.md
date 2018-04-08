# WordPress API Accelerator

Speed up the WordPress API

## Getting Started

This accelerator speeds up the WordPress API by simply by-passing unnecessary plugins.

Simply upload this plugin to you mu-plugins folder inside the wp-content folder of your WordPress website. 
If you don't have an mu-plugins folder, you can simply create one.

### Prerequisites

You need to be able to access the files and folder structure of your WordPress site.

### Installing

Once you've added the file to your mu-plugin folder, you should start to see API request performance improvements.

By default, the API Accelerator will only effect the default API endpoints.

**Please Note**
If you are serving additional endpoints from other plugins you *must* include them in the plugin array. For this reason, this plugin is currently intended for Developers only.

To add a plugin, simply use the folder name and main file, for example `site-in-numbers/site-in-numbers.php`.

If our API plugin has dependancies, they can be added to the API array
```
  $api[] = array(
    'dependancy-plugin/dependancy-plugin.php',
     'another-dependancy-plugin/another-dependancy-plugin.php'
  );
```
Then we call the plugin containing the API endpoint
```
  $api[] = 'site-in-numbers/site-in-numbers.php';
```

## Deployment

Ensure adding plugins containing API endpoints is added to your goLive checklist

## Contributing

Please read [CONTRIBUTING.md] for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. 

## Authors

* [**Sean Blakeley**](https://www.seanblakeley.co.uk) - *Initial work*

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Big thanks to [Carmine Colicino](https://github.com/colis)

