@echo off
echo Starting Project Setup...


:: 1. Create the main folder
mkdir My_New_Web_App
cd My_New_Web_App


:: 2. Create sub-folders
mkdir css
mkdir js
mkdir images


:: 3. Create blank files (The "type nul" trick creates an empty file)
type nul > index.html
type nul > css\style.css
type nul > js\script.js
type nul > README.md


echo Setup Complete! Your project is ready.
Pause
