/* Creates 5 fake client users with the password 'password' */
INSERT INTO users 
    (email, password, first_name, last_name, company_name, logo, phone, address, city, state, zip, verified, active)
VALUES 
    ('1@test.com', '$2y$10$EKSRsspSHPr24gBDOOpPH.zOcR2L/NxMmIM1UQQcIsxbwPE2vRcSK', 'Honest', 'Joe', 'Honest Joe Tea', 'http://www.gravatar.com/avatar/e1f3994f2632af3d1c8c2dcc168a10e6?d=retro', '2085551111', '123 St', 'Boise', 'ID', '83705', true, true),
    ('2@test.com', '$2y$10$EKSRsspSHPr24gBDOOpPH.zOcR2L/NxMmIM1UQQcIsxbwPE2vRcSK', 'Jane', 'Doe', 'Socks R Us', 'http://www.gravatar.com/avatar/e1f3994f2632af3d1c8c2dcc168a10e6?d=retro', '2085552222', '222 St', 'Boise', 'ID', '83705', true, true),
    ('3@test.com', '$2y$10$EKSRsspSHPr24gBDOOpPH.zOcR2L/NxMmIM1UQQcIsxbwPE2vRcSK', 'John', 'Doe', 'PS5 Secured Inc', 'http://www.gravatar.com/avatar/e1f3994f2632af3d1c8c2dcc168a10e6?d=retro', '2085553333', '333 St', 'Boise', 'ID', '83705', true, true),
    ('4@test.com', '$2y$10$EKSRsspSHPr24gBDOOpPH.zOcR2L/NxMmIM1UQQcIsxbwPE2vRcSK', 'Tom', 'Bananas', "Plumbing, but no toilet stuff" , 'http://www.gravatar.com/avatar/e1f3994f2632af3d1c8c2dcc168a10e6?d=retro', '2085554444', '444 St', 'Boise', 'ID', '83705', true, false),
    ('5@test.com', '$2y$10$EKSRsspSHPr24gBDOOpPH.zOcR2L/NxMmIM1UQQcIsxbwPE2vRcSK', 'Joey', 'Appleseed', 'I will wear wear a bikini in your business ad', 'http://www.gravatar.com/avatar/e1f3994f2632af3d1c8c2dcc168a10e6?d=retro', '2085555555', '555 St', 'Boise', 'ID', '83705', false, false);


/* Creates fake invoices of varius statuses. */
INSERT INTO invoices
    (user_id, status, due_at, subtotal_amount, total_amount, summary, admin_note, client_note)
VALUES
    (1, 'sent', '2021-07-15 0:0:0', 2000, 2000, 'Make a simple company website.', 'Guy seems cool.', 'Remember to ask if we can add a picture of my cat to the website.'),
    (1, 'sent', '2021-07-18 0:0:0', 50, 50, 'Add a picture of your cat.', 'omg', ''),
    (2, 'sent', '2021-07-25 0:0:0', 500, 500, 'SEO', '', ''),
    (2, 'sent', '2021-07-28 0:0:0', 400, 400, 'ADA Audit and fixes', '', ''),
    (3, 'sent', '2021-08-01 0:0:0', 10000, 10000, 'Web Application', '', ''),
    (1, 'sent', '2021-08-01 0:0:0', 30, 30, 'Hosting', '', ''),
    (3, 'sent', '2021-08-02 0:0:0', 450, 450, 'Bug fixes', '', ''),
    (3, 'sent', '2021-08-03 0:0:0', 1000, 1000, 'Delete users dashboard feature', '', ''),
    (3, 'sent', '2021-08-05 0:0:0', 750, 750, 'Add users dashboard feature', '', ''),
    (3, 'sent', '2021-08-14 0:0:0', 1250, 1250, 'Create API endpoints to get users and favorites', 'Guy wants info in JSON for his web designer', ''),
    (1, 'sent', '2021-09-01 0:0:0', 30, 30, 'Hosting', '', ''),
    (3, 'sent', '2021-09-05 0:0:0', 2500, 2500, 'New file uploads to s3 feature', '', 'Ask about how much adding drag and drop would cost.'),
    (3, 'sent', '2021-09-08 0:0:0', 900, 900, 'Add drag and drop to s3 file upload', '', ''),
    (3, 'sent', '2021-09-15 0:0:0', 3000, 3000, 'New admin dashboard analysis feature', '', ''),
    (3, 'sent', '2021-09-20 0:0:0', 1000, 1000, 'Redesign login page', '', ''),
    (3, 'sent', '2021-09-24 0:0:0', 800, 800, 'Mobile success message feature', '', ''),
    (3, 'sent', '2021-09-24 0:0:0', 500, 500, 'Slack success message feature', "He said the slack hook info would be emailed to me by Friday", ''),
    (3, 'draft', '2021-09-30 0:0:0', 3000, 3000, 'Search filter feature', '', ''),
    (1, 'sent', '2021-10-01 0:0:0', 30, 30, 'Hosting', '', ''),
    (3, 'draft', '2021-10-15 0:0:0', 800, 800, 'Seasonal Halloween theme', '', ''),
    (4, 'sent', '2021-10-15 0:0:0', 200, 200, 'SEO Audit', 'client is not going to ask for any more work after this.', ''),
    (5, 'unpaid', '2021-08-10 0:0:0', 2000, 2000, 'Website creation', "Guy wouldn't pay.", ''),
    (5, 'unpaid', '2021-09-01 0:0:0', 30, 30, 'Hosting', "Guy wouldn't pay.", ''),
    (3, 'cancelled', '2021-09-01 0:0:0', 30, 30, 'Wanted to add a paypal checkout feature', "Changed their mind", '');

