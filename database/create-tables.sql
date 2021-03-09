CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  company_name VARCHAR(255) NOT NULL,
  logo VARCHAR(255),
  phone VARCHAR(255),
  address VARCHAR(255),
  suite VARCHAR(255),
  city VARCHAR(255),
  state VARCHAR(255),
  zip VARCHAR(255),
  admin BOOLEAN DEFAULT false,
  verified BOOLEAN DEFAULT false,
  active BOOLEAN DEFAULT false,
  created_at TIMESTAMP
);

CREATE TABLE settings (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  user_id INTEGER,
  FOREIGN KEY (user_id) REFERENCES users(id),
  motivational_cat BOOLEAN DEFAULT false,
  email_updates BOOLEAN DEFAULT false
);

CREATE TABLE invoices (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  user_id INTEGER,
  FOREIGN KEY (user_id) REFERENCES users(id),
  status ENUM('draft', 'sent', 'cancelled', 'unpaid') DEFAULT 'draft',
  due_at DATETIME NOT NULL,
  subtotal_amount DECIMAL(10,2) NOT NULL,
  discount DECIMAL(10,2) DEFAULT 0.00,
  taxes DECIMAL(10,2) DEFAULT 0.00,
  total_amount DECIMAL(10,2) NOT NULL,
  summary VARCHAR(255),
  admin_note VARCHAR(255),
  client_note VARCHAR(255)
);

CREATE TABLE payments (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  invoice_id INTEGER,
  FOREIGN KEY (invoice_id) REFERENCES invoices(id),
  user_id INTEGER,
  FOREIGN KEY (user_id) REFERENCES users(id),
  amount DECIMAL(10,2) NOT NULL,
  paid_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE line_items (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  invoice_id INTEGER,
  FOREIGN KEY (invoice_id) REFERENCES invoices(id),
  description VARCHAR(255) NOT NULL,
  quantity_hours DECIMAL(5,2) NOT NULL,
  rate DECIMAL(9,2) NOT NULL,
  amount DECIMAL(10,2) NOT NULL
);