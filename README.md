# GRPC

My Proof of Concept to use GRPC with at least 2 languages.

# Assumptions

- could use of client/server as separated instances,
- share kernel PHP GPRC code to be a contract
- independent `*.proto` repository to have possibility use of another package manager in other technology than PHP.

# Installation

### Initial

First, as I have a race here `composer` vs (`client` & `server`), need manually run composer:
```
make composer-install
```

This will initialize all composer dependency.

### Run

Second, we can run `Client` vs `Server` test
```
make run-test
```

# Sources

- [My previous MonoRepo experience](https://github.com/timiTao/monorepo)
- [GRPC PHP Documentation](https://github.com/grpc/grpc/tree/master/src/php)
- [Spiral/php-grpc](https://github.com/spiral/php-grpc) - framework to make PHP GRPC server
- [heh9/php-grpc](https://github.com/heh9/php-grpc)
- [Matt Allan - Writing Protobuf Services in PHP](https://mattallan.me/posts/protobuf-php-services/)