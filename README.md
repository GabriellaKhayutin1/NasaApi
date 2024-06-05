<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
Link to my hosted NasaApi from heroku: https://nasaapi1-485a941dd0d9.herokuapp.com/

NASA API Testing
Part 1: Test Plan
User Stories
User Story 1: Viewing Daily Pictures

Description: As a user, I want to view pictures of the day from NASA so that I can see recent astronomical images.
Happy Path: The user successfully views the images for the last 4 days.
Unhappy Path: The NASA API fails to return images.

User Story 2: Viewing Picture Details

Description: As a user, I want to view details of a specific picture so that I can learn more about it.
Happy Path: The user successfully views the details of a picture for a given date.
Unhappy Path: The NASA API fails to return details for the given date.

User Story 1: Viewing Daily Pictures

Scenario: The API returns images successfully.
Test: Verify that the images are displayed on the page.

Scenario: The API fails to return images.
Test: Verify that an error message is displayed.

User Story 2: Viewing Picture Details

Scenario: The API returns details successfully.
Test: Verify that the picture details are displayed on the page.

Scenario: The API fails to return details.
Test: Verify that an error message is displayed.

Unit Tests
User Story 1: Viewing Daily Pictures

Functionality: Fetch images from the NASA API for the last 4 days.
Test: Ensure the function correctly formats the API request and handles the response.
User Story 2: Viewing Picture Details

Functionality: Fetch details of a specific picture from the NASA API.
Test: Ensure the function correctly formats the API request and handles the response.


Applying the V-Model
User Story 1: Viewing Daily Pictures

System Test (Happy Path)
Description: Verify that the images for the last 4 days are displayed correctly.
Test Steps:
Navigate to the daily pictures page.
Check that 4 images are displayed.
Verify the date and title for each image.
System Test (Unhappy Path)
Description: Verify that an error message is displayed when the API fails.
Test Steps:
Simulate an API failure.
Navigate to the daily pictures page.
Check that an error message is displayed.
Unit Test
Function: fetchDailyPictures
Test: Ensure the function sends the correct API request and processes the response correctly.
User Story 2: Viewing Picture Details

System Test (Happy Path)
Description: Verify that the picture details for a given date are displayed correctly.
Test Steps:
Navigate to the picture details page for a specific date.
Check that the picture details are displayed.
Verify the title, date, and description.
System Test (Unhappy Path)
Description: Verify that an error message is displayed when the API fails.
Test Steps:
Simulate an API failure.
Navigate to the picture details page for a specific date.
Check that an error message is displayed.
Unit Test
Function: fetchPictureDetails
Test: Ensure the function sends the correct API request and processes the response correctly.
Part 3: Screenshot of Completed Tests:
![image](https://github.com/GabriellaKhayutin1/NasaApi/assets/144113555/eb58ba72-d463-4fb1-bdf8-6130664189aa)

Part 4: Evaluation
Possible Mistake/Error Detected by My Tests

1. A possible error that can be detected by the tests is the API failing to return data, which would result in an error message being displayed instead of the expected images or details.
Possible Mistake/Error Not Detected by My Tests

2. A possible error that cannot be detected by the tests is an intermittent network issue that occurs randomly and does not consistently affect the API requests. This would require more extensive monitoring and logging to detect.
Conclusion: To What Extent Can You Conclude That "Everything Works Correctly"?

My arguments:
The tests show that the main functionalities (viewing daily pictures and picture details) are working correctly under expected conditions.
They also handle common failure scenarios such as API failures.
However, the tests do not cover all possible edge cases or performance issues. Continuous monitoring, logging, and additional tests for edge cases and load testing would be necessary to conclude that everything works correctly under all conditions.
