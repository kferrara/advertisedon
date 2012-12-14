using System.Data;
using System.Linq;
using System.Web.Mvc;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    //[Authorize(Roles = "Administrator")]
    public class BusinessController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /Default1/
        public ActionResult Index()
        {
            return View(db.Businesses.ToList());
        }

        //
        // GET: /Default1/Details/5
        public ActionResult Details(int id = 0)
        {
            var business = db.Businesses.Find(id);

            if (business == null)
            {
                return HttpNotFound();
            }

            return View(business);
        }

        //
        // GET: /Default1/Create
        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /Default1/Create
        [HttpPost]
        public ActionResult Create(Business business)
        {
            if (ModelState.IsValid)
            {
                db.Businesses.Add(business);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(business);
        }

        //
        // GET: /Default1/Edit/5
        public ActionResult Edit(int id = 0)
        {
            var business = db.Businesses.Find(id);

            if (business == null)
            {
                return HttpNotFound();
            }

            return View(business);
        }

        //
        // POST: /Default1/Edit/5
        [HttpPost]
        public ActionResult Edit(Business business)
        {
            if (ModelState.IsValid)
            {
                db.Entry(business).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(business);
        }

        //
        // GET: /Default1/Delete/5
        public ActionResult Delete(int id = 0)
        {
            var business = db.Businesses.Find(id);

            if (business == null)
            {
                return HttpNotFound();
            }

            return View(business);
        }

        //
        // POST: /Default1/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            var business = db.Businesses.Find(id);

            db.Businesses.Remove(business);
            db.SaveChanges();

            return RedirectToAction("Index");
        }

        [ChildActionOnly]
        public ActionResult BusinessInTile()
        {
            return PartialView("_Business", db.Businesses.ToList().Take(10));
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}