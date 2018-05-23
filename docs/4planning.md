# PROJECT PLAN

## v1.0.0.0

### ASSEsSMENTS

#### DEVELOPER'S ASSESSMENT

1. The project will be designed and developed with partial-tracking, since time is very critical.  
2. Open-source resources will be utilized across the project  
3. The project will be built under Laravel Framework

#### CURRENT CONDITION

The current environment of the office is very traditional with processes are done handwritten and manually (acoording to the description client).  The business is SEC-registered entity and have been operating for 15 years in bicycle and motorcycle parts retailing business.

Deducted IT resources:
(possibly 'none' other than the internet connectivity)

#### TARGET CONDITION

1. Trial website to be deployed at cloud web-hosting services
2. Actual deployment would be at locally-hosted web-application

#### HARDWARE RESOURCES

1. standard specs PC as a server (Intel i5, or better)
2. minimal specs PC as a client/data-entry (Intel Atom, or better)
3. Internet connection to clone the project repository to the actual server environment

#### PEOPLEWARE

1. End-user would be the owner/staff of the business, possibly less than 10 pax  
2. Provide role-specific credentials to managers and users  
3. Other people are restricted to access the web application  

---

### FRONTEND


#### FRONTEND ARCHITECTURE

The project will be built under Laravel Framework including its Bootstrap Framework for front-end applications.
Will not focus on the frontend aspect, hence design would be minimal and simple

#### WEB RESPONSIVENESS

As a default, Bootstrap Framework offers responsive layouts

#### SKETCHES

(TBA)

#### WIREFRAMES

1. Index+Sign-In Page
displays realtime statistics of the inventory
displays sign-in form

2. Staff Page
displays inventory for checking out

3. Manager Page
displays adding users
displays inventory for adding

4. Inventory Page
displays table of existing inventory

#### COLOR SCHEMES

Monochromatic, Paper-like Black-on-White colors

#### INTERACTIVE ELEMENTS

Form-buttons, page-navigations, sign-up/sign-in page,

#### ANIMATION

Bootstrap-default, but no custom animations will be made by the developer

### BACKEND

#### BACKEND ARCHITECTURE

As mentioned, the project will be built under Laravel Framework, MariaDB for database, and AJAX for asynchronous web operations. Since Laravel Framework is written under PHP, the project will utilize PHP in its back-end programming.  

#### ENVIRONMENT

The project will be deployed initially at 000Webhost.com web-hosting services, but on the actual environment, the web will be hosted using XAMPP. More-or-less on a Windows platform PC.

#### LOGIC DIAGROM

(TBA)

#### DATABASE TABLES

Laravel Framework allows creation of tables to be scripted via migrations
Here's the list of the tables for the migration:

1. Users (modified from default)
  id*
  username
  password
  firstname
  lastname
  role

2. Items
  id*
  code
  name
  brand
  model
  price
  barcode
  description
  qty

3. ItemIncomings
  id*
  ref_Items
  invoice

4. ItemOutgoings
  id*
  ref_Items
  invoice

#### DATABASE ERD

(TBA)

### ASYNCHRONOUS WEB OPERATION

Although Fetch-API is the preferred by the developer, because Laravel utilize AJAX, AJAX will be implemented in this project
