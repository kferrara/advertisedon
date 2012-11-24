using System.Data;
using System.Linq;
using System.Web.Mvc;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    [Authorize(Roles = "Administrator")]
    public class EmailTypeController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /EmailType/
        public ActionResult Index()
        {
            return View(db.EmailTypes.ToList());
        }

        //
        // GET: /EmailType/Details/5
        public ActionResult Details(int id = 0)
        {
            var emailtype = db.EmailTypes.Find(id);
            if (emailtype == null)
            {
                return HttpNotFound();
            }
            return View(emailtype);
        }

        //
        // GET: /EmailType/Create
        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /EmailType/Create
        [HttpPost]
        public ActionResult Create(EmailType emailtype)
        {
            if (ModelState.IsValid)
            {
                db.EmailTypes.Add(emailtype);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(emailtype);
        }

        //
        // GET: /EmailType/Edit/5
        public ActionResult Edit(int id = 0)
        {
            var emailtype = db.EmailTypes.Find(id);
            if (emailtype == null)
            {
                return HttpNotFound();
            }
            return View(emailtype);
        }

        //
        // POST: /EmailType/Edit/5
        [HttpPost]
        public ActionResult Edit(EmailType emailtype)
        {
            if (ModelState.IsValid)
            {
                db.Entry(emailtype).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(emailtype);
        }

        //
        // GET: /EmailType/Delete/5
        public ActionResult Delete(int id = 0)
        {
            var emailtype = db.EmailTypes.Find(id);
            if (emailtype == null)
            {
                return HttpNotFound();
            }
            return View(emailtype);
        }

        //
        // POST: /EmailType/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            var emailtype = db.EmailTypes.Find(id);
            db.EmailTypes.Remove(emailtype);
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