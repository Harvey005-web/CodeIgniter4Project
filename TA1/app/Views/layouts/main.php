<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | QuickSale POS</title>
    <style>
        :root { 
            color-scheme: light;
             --navy: #173b5f;
             --blue: #2274a5;
             --paper: #f5f7fa;
             --ink: #1d2939; 
            }

        * { 
            box-sizing: border-box; 
          }
          
        body { 
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: Arial, sans-serif;
        }

        nav { 
            display: flex;
            gap: 1.25rem;
            align-items: center;
            padding: 1rem max(5vw, 1.5rem);
            background: var(--navy); 
        }

        nav a { 
            color: #fff;
            text-decoration: none;
            font-weight: 600; 
        }

        nav .brand { 
            margin-right: auto;
            font-size: 1.15rem; 
        }

        main { 
            max-width: 960px;
            margin: 0 auto;
            padding: 3rem 1.5rem; 
        }

        .hero, .card { 
            background: #fff; 
            border-radius: 12px; 
            padding: 2rem; 
            box-shadow: 0 2px 10px #12263a14; 
        }

        .hero { 
            text-align: center; 
            padding: 4rem 2rem; 
        }

        h1 { 
            color: var(--navy); 
            margin-top: 0; 
        }

        .button { 
            display: inline-block; 
            background: var(--blue); 
            color: #fff; 
            border-radius: 6px; 
            padding: .7rem 1rem; 
            text-decoration: none;
            font-weight: 700; 
            margin: .4rem; 
        }
        
        table { 
            width: 100%; 
            border-collapse: collapse; 
            background: #fff; 
        }

        th, td { 
            padding: .9rem 1rem; 
            text-align: left; 
            border-bottom: 1px solid #e4e7ec; 
        }

        th { 
            color: #fff; 
            background: var(--navy); 
        }

        tr:last-child td { 
            border-bottom: 0; 
        }

        .count { 
            color: #667085; 
            margin-bottom: 1rem; 
        }
        
        @media (max-width: 600px) { nav { flex-wrap: wrap; } nav .brand { width: 100%; } th, td { padding: .7rem .5rem; font-size: .9rem; } }
        
    </style>
</head>
<body>
    <nav>
        <a class="brand" href="<?= site_url('/') ?>">QuickSale POS</a>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customers</a>
        <a href="<?= site_url('users') ?>">Users</a>
    </nav>
    <main><?= $this->renderSection('content') ?></main>
</body>
</html>
