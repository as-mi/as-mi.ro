# Site-ul principal al Asociației Studenților la Matematică și Informatică

Acest repository conține codul de PHP din tema custom folosită pe [site-ul ASMI](https://www.asmi.ro).

## Configurație

### Hardware

Site-ul asociației este hostat pe [DigitalOcean](https://www.digitalocean.com/), pe un droplet (mașină virtuală) cu Ubuntu.
Contul este asociat Consiliului Director, iar plata se face din fondurile asociației.

### Software 

Stiva de tehnologii folosită este:

- Server: [NGINX](https://www.nginx.com/)
- Bază de date: [MySQL](https://www.mysql.com/)
- [WordPress](https://wordpress.com/)
  - Tema de bază [Ildy](https://colorlib.com/wp/themes/illdy/)
  - Tema child cu modificările noastre (acest repo)

De asemenea, avem configurat [Let's Encrypt](https://letsencrypt.org/) cu reînnoire automată pentru HTTPS.
