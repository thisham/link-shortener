# link-shortener

### Pre-Requirement
- PHP 7.3.0

### Installation
1. git clone https://github.com/thisham/link-shortener.git
2. Edit the configurations in config/config.php

### Database
Make an database which is contain one table named links. This table only contains:
- [Primary Key] shortened (varchar(32));
- target_url (text);
- date_created (datetime).
