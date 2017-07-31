import MySQLdb, random, string

def rand_dig(l):
    return ''.join(random.choice(string.digits) for _ in range(l))

family_ids = []

db = MySQLdb.connect(host="localhost", user="", passwd="", db="")

cur = db.cursor()

cur.execute("SELECT DISTINCT family_id FROM invites")

for row in cur.fetchall():
    family_ids.append(row[0])

db.close()

sql = "INSERT INTO passphrases (family_id, passphrase, has_logged_in) VALUES "

for family_id in family_ids:
    sql = sql + "(" + str(family_id) + ",'" + str(rand_dig(10)) + "',0)" + (";" if family_ids[len(family_ids) - 1] == family_id else ", ")

insert_db = MySQLdb.connect(host="localhost", user="", passwd="", db="")

insert_cur = insert_db.cursor()

try:
    insert_cur.execute(sql)
    insert_db.commit()
    print "inserted"
except:
    insert_db.rollback()
    print "something went wrong"

insert_db.close()
