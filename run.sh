#!/bin/bash

# Change file permissions
chmod -R 755 m1
chmod -R 711 fuel

# Move the "fuel" folder to the parent directory
mv fuel ../

# Move the "m1" folder to the parent directory
mv m1 ../
