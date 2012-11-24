using System.Data;
using System.Linq;
using System.Web.Mvc;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    [Authorize(Roles = "Administrator")]
    public class ContactTypeController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /ContactType/
        public ActionResult Index()
        {
            return View(db.ContactTypes.ToList());
        }

        //
        // GET: /ContactType/Details/5
        public ActionResult Details(int id = 0)
        {
            var contacttype = db.ContactTypes.Find(id);
            if (contacttype == null)
            {
                return HttpNotFound();
            }
            return View(contacttype);
        }

        //
        // GET: /ContactType/Create
        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /ContactType/Create
        [HttpPost]
        public ActionResult Create(ContactType contacttype)
        {
            if (ModelState.IsValid)
            {
                db.ContactTypes.Add(contacttype);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(contacttype);
        }

        //
        // GET: /ContactType/Edit/5
        public ActionResult Edit(int id = 0)
        {
            var contacttype = db.ContactTypes.Find(id);
            if (contacttype == null)
            {
                return HttpNotFound();
            }
            return View(contacttype);
        }

        //
        // POST: /ContactType/Edit/5
        [HttpPost]
        public ActionResult Edit(ContactType contacttype)
        {
            if (ModelState.IsValid)
            {
                db.Entry(contacttype).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(contacttype);
        }

        //
        // GET: /ContactType/Delete/5
        public ActionResult Delete(int id = 0)
        {
            var contacttype = db.ContactTypes.Find(id);
            if (contacttype == null)
            {
                return HttpNotFound();
            }
            return View(contacttype);
        }

        //
        // POST: /ContactType/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            var contacttype = db.ContactTypes.Find(id);
            db.ContactTypes.Remove(contacttype);
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