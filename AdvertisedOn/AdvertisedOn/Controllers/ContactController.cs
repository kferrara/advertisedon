using System.Data;
using System.Linq;
using System.Web.Mvc;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    [Authorize(Roles = "Administrator")]
    public class ContactController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /Contact/
        public ActionResult Index()
        {
            return View(db.Contacts.ToList());
        }

        //
        // GET: /Contact/Details/5
        public ActionResult Details(int id = 0)
        {
            var contact = db.Contacts.Find(id);
            if (contact == null)
            {
                return HttpNotFound();
            }
            return View(contact);
        }

        //
        // GET: /Contact/Create
        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /Contact/Create
        [HttpPost]
        public ActionResult Create(Contact contact)
        {
            if (ModelState.IsValid)
            {
                db.Contacts.Add(contact);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(contact);
        }

        //
        // GET: /Contact/Edit/5
        public ActionResult Edit(int id = 0)
        {
            var contact = db.Contacts.Find(id);
            if (contact == null)
            {
                return HttpNotFound();
            }
            return View(contact);
        }

        //
        // POST: /Contact/Edit/5
        [HttpPost]
        public ActionResult Edit(Contact contact)
        {
            if (ModelState.IsValid)
            {
                db.Entry(contact).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(contact);
        }

        //
        // GET: /Contact/Delete/5
        public ActionResult Delete(int id = 0)
        {
            var contact = db.Contacts.Find(id);
            if (contact == null)
            {
                return HttpNotFound();
            }
            return View(contact);
        }

        //
        // POST: /Contact/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            var contact = db.Contacts.Find(id);
            db.Contacts.Remove(contact);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}